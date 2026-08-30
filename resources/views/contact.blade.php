@extends('layouts.app')

@section('title', 'Contact | Ragav Jyoti Puja & Jyotish Kendra')

@section('content')
<style>@media (max-width: 700px) { .contact-grid { grid-template-columns: 1fr !important; } }</style>
<div class="container">
    <p class="muted">RAGAV JYOTI PUJA &amp; JYOTISH KENDRA</p>
    <h1>Contact Acharya Rajesh Sharma</h1>
    <div class="grid contact-grid" style="grid-template-columns: .85fr 1.15fr; align-items:start;">
        <section>
            <h2>Book a consultation</h2>
            <p>For Vedic puja, muhurat guidance, kundli consultation, or an online Jyotish session, call or send your enquiry below.</p>
            <p><strong>Phone:</strong><br><a href="tel:+917974639689">+91 79746 39689</a></p>
            <p><strong>Email:</strong><br><a href="mailto:ajaysharmaas.094@gmail.com">ajaysharmaas.094@gmail.com</a></p>
            <p><strong>Service Area:</strong><br>At Your Home | Temple | Online Consultation</p>
            <a class="button secondary" href="tel:+917974639689">Call Now</a>
        </section>
        <form class="card" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <h2>Send an enquiry</h2>
            <label for="name">Name</label>
            <input id="name" name="name" value="{{ old('name') }}" required autofocus class="@error('name') invalid @enderror">
            @error('name') <span class="field-error">{{ $message }}</span> @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="@error('email') invalid @enderror">
            @error('email') <span class="field-error">{{ $message }}</span> @enderror

            <label for="mobile">Phone number</label>
            <input id="mobile" name="mobile" value="{{ old('mobile') }}" class="@error('mobile') invalid @enderror">
            @error('mobile') <span class="field-error">{{ $message }}</span> @enderror

            <label for="subject">Subject</label>
            <input id="subject" name="subject" value="{{ old('subject') }}" placeholder="For example, Griha Pravesh Puja">

            <label for="message">Message</label>
            <textarea id="message" name="message" required class="@error('message') invalid @enderror">{{ old('message') }}</textarea>
            @error('message') <span class="field-error">{{ $message }}</span> @enderror

            <button class="button full" type="submit">Send enquiry</button>
        </form>
    </div>
</div>
@endsection
