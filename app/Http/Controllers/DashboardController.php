<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $donations = $request->user()->donations()->latest()->get();

        return view('dashboard', [
            'donations' => $donations,
            'totalDonated' => $donations->where('status', 'paid')->sum('amount'),
        ]);
    }
}
