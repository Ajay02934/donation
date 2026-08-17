@extends('layouts.app')
@section('title', 'Log in · Donation')
@section('content')
<section class="card auth-card"><h1>Welcome back</h1><p class="muted">Log in to your Donation account.</p>
<form method="POST" action="{{ route('login.store') }}">@csrf
    <label for="email">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    <label for="password">Password</label><input id="password" type="password" name="password" required>
    <label class="check"><input type="checkbox" name="remember" value="1"><span>Keep me signed in</span></label>
    <button class="button full" type="submit">Log in</button>
</form><p class="muted">New here? <a href="{{ route('register') }}">Create an account</a></p></section>
@endsection
