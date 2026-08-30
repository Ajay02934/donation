@extends('layouts.app')
@section('title','Booking '.$booking->booking_number)
@section('content')
<div class="card" style="max-width:700px"><p class="muted">BOOKING RESERVED</p><h1>Thank you, {{$booking->name}}</h1><p>Your reference is <strong>{{$booking->booking_number}}</strong>.</p><table><tr><th>Puja</th><td>{{$booking->puja->name}}</td></tr><tr><th>Total</th><td>₹{{number_format($booking->amount)}}</td></tr><tr><th>Status</th><td>{{$booking->status}}</td></tr></table><p class="muted">We will contact you to confirm the arrangement and payment.</p></div>
@endsection
