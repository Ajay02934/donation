@extends('layouts.app')
@section('title', 'Vedic Guidance | Ragav Jyoti')
@section('content')
<div class="container">
    <p class="muted">VEDIC GUIDANCE</p>
    @if($selectedGuidance)
        <h1>{{ $selectedGuidance['title'] }}</h1>
        <article class="card" style="margin-top: 28px; border-left: 4px solid #e95b09">
            <p>{{ $selectedGuidance['description'] }}</p>
        </article>
    @else
        <h1>Vedic Guidance</h1>
        <p class="muted">Personalised Jyotish guidance for the decisions and milestones that shape your life.</p>
    @endif

    @unless($selectedGuidance)
        <div class="grid" style="margin-top: 28px">
            @forelse($services as $service)
                <article class="card">
                    <h2>{{ $service->name }}</h2>
                    <p>{{ $service->description }}</p>
                    @if($service->benefits)
                        <ul>
                            @foreach($service->benefits as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <p class="muted">{{ $service->duration }} · ₹{{ number_format($service->price) }}</p>
                </article>
            @empty
                <p>Our Vedic guidance services are being prepared.</p>
            @endforelse
        </div>
    @endunless
</div>
@endsection
