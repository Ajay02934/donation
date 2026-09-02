@extends('layouts.app')

@php
    $seoTitle = $puja->name . ' in Ujjain | Raghav Puja Kendra';
    $seoDescription = \Illuminate\Support\Str::limit($puja->excerpt, 125) . ' Puja service in Ujjain.';
    $canonicalUrl = 'https://raghavjyotishujjain.online/pujas/' . $puja->slug;
@endphp

@section('title', $seoTitle)
@section('meta')
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ $canonicalUrl }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
@endsection

@section('content')
<p class="muted">{{ $puja->category?->name }}</p>
<h1>{{ $puja->name }} in Ujjain</h1>
<p class="amount">₹{{ number_format($puja->price) }} <span class="muted">· {{ $puja->duration }}</span></p>
<div class="grid" style="grid-template-columns:1.4fr .8fr">
    <article class="card">
        <h2>About {{ $puja->name }}</h2>
        <p>{!! nl2br(e($puja->description)) !!}</p>
        <h2>{{ $puja->name }} benefits</h2>
        <ul>@foreach($puja->benefits ?? [] as $benefit)<li>{{ $benefit }}</li>@endforeach</ul>
        <h2>Required samagri</h2>
        <p>{{ implode(', ', $puja->samagri ?? []) }}</p>
    </article>
    <aside class="card">
        <h2>Available slots</h2>
        @forelse($puja->slots->filter->hasAvailability() as $slot)
            <p>{{ $slot->slot_date->format('D, d M') }} · {{ substr($slot->start_time, 0, 5) }}</p>
        @empty
            <p class="muted">New slots are added regularly.</p>
        @endforelse
        @auth
            <a class="button full" href="{{ route('bookings.create', $puja) }}">Book now</a>
        @else
            <a class="button full" href="{{ route('login') }}">Sign in to book</a>
        @endauth
    </aside>
</div>
@endsection
