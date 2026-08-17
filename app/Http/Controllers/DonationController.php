<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->validate(['amount' => ['required', 'numeric', 'min:1', 'max:1000000']]);

        if (! config('services.stripe.secret')) {
            return back()->withErrors(['amount' => 'Payments are not configured yet. Add STRIPE_SECRET to the environment file.']);
        }

        $donation = $request->user()->donations()->create([
            'amount' => $data['amount'],
            'currency' => config('services.stripe.currency', 'usd'),
            'status' => 'pending',
            'gateway' => 'stripe',
        ]);

        try {
            $response = Http::withOptions(['verify' => config('services.stripe.verify_ssl')])
                ->asForm()->withBasicAuth(config('services.stripe.secret'), '')
                ->post('https://api.stripe.com/v1/checkout/sessions', [
                    'mode' => 'payment',
                    'success_url' => route('donation.success').'?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('dashboard'),
                    'client_reference_id' => (string) $donation->id,
                    'metadata[donation_id]' => (string) $donation->id,
                    'line_items[0][price_data][currency]' => $donation->currency,
                    'line_items[0][price_data][product_data][name]' => 'Donation',
                    'line_items[0][price_data][unit_amount]' => (string) round($donation->amount * 100),
                    'line_items[0][quantity]' => 1,
                ]);

            if ($response->failed() || ! $response->json('url')) {
                report(new \RuntimeException('Stripe Checkout creation failed: '.$response->body()));
                $donation->update(['status' => 'failed']);
                return back()->withErrors(['amount' => 'We could not start checkout. Please try again.']);
            }

            $donation->update(['gateway_session_id' => $response->json('id')]);
            return redirect()->away($response->json('url'));
        } catch (\Throwable $exception) {
            report($exception);
            $donation->update(['status' => 'failed']);
            return back()->withErrors(['amount' => 'We could not connect to the payment provider. Please try again.']);
        }
    }

    public function success(Request $request)
    {
        $request->validate(['session_id' => ['required', 'string']]);
        $donation = $request->user()->donations()->where('gateway_session_id', $request->input('session_id'))->firstOrFail();

        try {
            $session = Http::withOptions(['verify' => config('services.stripe.verify_ssl')])
                ->withBasicAuth(config('services.stripe.secret'), '')
                ->get('https://api.stripe.com/v1/checkout/sessions/'.$donation->gateway_session_id)->throw()->json();

            if (($session['payment_status'] ?? null) === 'paid') {
                $donation->update([
                    'status' => 'paid',
                    'gateway_payment_id' => $session['payment_intent'] ?? null,
                    'paid_at' => now(),
                ]);
                return redirect()->route('dashboard')->with('success', 'Thank you — your donation was received.');
            }
        } catch (\Throwable $exception) {
            report($exception);
        }

        return redirect()->route('dashboard')->with('warning', 'Your payment is still being confirmed. Please refresh shortly.');
    }
}
