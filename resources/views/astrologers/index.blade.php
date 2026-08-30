@extends('layouts.app')
@section('title', 'Our Acharyas | Ragav Jyoti')
@section('content')
<div class="container">
    <p class="muted">MEET OUR GUIDES</p>
    <h1>Our Acharyas</h1>
    <p class="muted">Experienced practitioners to guide you through Vedic astrology and sacred rituals.</p>

    <div class="grid" style="margin-top: 28px">
        @forelse($astrologers as $astrologer)
            <article class="card profile">
                @if($astrologer->photo)
                    <img src="{{ asset('storage/' . $astrologer->photo) }}" alt="{{ $astrologer->name }}" style="width:100%; aspect-ratio:4/3; object-fit:cover; margin-bottom:18px">
                @endif
                <h2>{{ $astrologer->name }}</h2>
                <p class="muted">{{ $astrologer->specialization }}</p>
                <dl>
                    <dt>Experience</dt>
                    <dd>{{ $astrologer->experience_years }} years</dd>
                    <dt>Languages</dt>
                    <dd>{{ $astrologer->languages }}</dd>
                    <dt>Rating</dt>
                    <dd>{{ number_format((float) $astrologer->rating, 1) }} / 5</dd>
                </dl>
                @if($astrologer->bio)
                    <p style="margin-top:18px">{{ $astrologer->bio }}</p>
                @endif
            </article>
        @empty
            <p>No acharyas are available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection
