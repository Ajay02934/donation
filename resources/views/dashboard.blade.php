@extends('layouts.app')
@section('title', 'My account · Donation')
@section('content')
<h1>My account</h1><p class="muted">Donate securely and view your complete transaction history.</p>
<div class="grid">
    <div>
        <section class="card"><h2>Make a donation</h2><p class="muted">You’ll be sent to Stripe’s secure checkout to complete your donation.</p><form method="POST" action="{{ route('donation.checkout') }}">@csrf<label for="amount">Donation amount (USD)</label><input class="amount" id="amount" name="amount" type="number" min="1" max="1000000" step="0.01" placeholder="25.00" value="{{ old('amount') }}" required><button class="button full" type="submit">Donate with Stripe</button></form></section>
        <section class="card profile" style="margin-top:24px"><h2>Your details</h2><dl><dt>Name</dt><dd>{{ auth()->user()->name }}</dd><dt>Email</dt><dd>{{ auth()->user()->email }}</dd><dt>Mobile</dt><dd>{{ auth()->user()->mobile }}</dd><dt>Address</dt><dd>{{ auth()->user()->address }}</dd></dl></section>
    </div>
    <div>
        <section class="card"><p class="muted">Total successful donations</p><p class="stat">${{ number_format($totalDonated, 2) }}</p></section>
        <section class="card" style="margin-top:24px"><h2>Transaction history</h2>@if($donations->isEmpty())<p class="muted">No donations yet. Your payments will appear here, grouped by date.</p>@else <table><thead><tr><th>Date</th><th>Amount</th><th>Status</th></tr></thead><tbody>@foreach($donations as $donation)<tr><td>{{ $donation->created_at->format('M j, Y') }}<br><span class="muted">{{ $donation->created_at->format('g:i A') }}</span></td><td>${{ number_format($donation->amount, 2) }}</td><td><span class="badge {{ $donation->status }}">{{ $donation->status }}</span></td></tr>@endforeach</tbody></table>@endif</section>
    </div>
</div>
@endsection
