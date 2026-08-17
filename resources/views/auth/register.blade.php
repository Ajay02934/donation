@extends('layouts.app')
@section('title', 'Create account · Donation')
@section('content')
<section class="card auth-card"><h1>Create your account</h1><p class="muted">Join us to make and track your donations.</p>
<form method="POST" action="{{ route('register.store') }}" novalidate>@csrf
    <label for="name">Full name</label><input id="name" name="name" value="{{ old('name') }}" class="@error('name') invalid @enderror" autofocus>@error('name')<span class="field-error">{{ $message }}</span>@enderror
    <label for="email">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" class="@error('email') invalid @enderror">@error('email')<span class="field-error">{{ $message }}</span>@enderror
    <label for="mobile">Mobile number</label><input id="mobile" type="tel" name="mobile" value="{{ old('mobile') }}" class="@error('mobile') invalid @enderror">@error('mobile')<span class="field-error">{{ $message }}</span>@enderror
    <label for="address">Address</label><textarea id="address" name="address" class="@error('address') invalid @enderror">{{ old('address') }}</textarea>@error('address')<span class="field-error">{{ $message }}</span>@enderror
    <label for="password">Password</label><input id="password" type="password" name="password" class="@error('password') invalid @enderror">@error('password')<span class="field-error">{{ $message }}</span>@enderror
    <label for="password_confirmation">Confirm password</label><input id="password_confirmation" type="password" name="password_confirmation">
    <label class="check"><input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}><span>I agree to the terms and conditions.</span></label>@error('terms')<span class="field-error">{{ $message }}</span>@enderror
    <button class="button full" type="submit">Create account</button>
</form><p class="muted">Already registered? <a href="{{ route('login') }}">Log in</a></p></section>
@endsection
