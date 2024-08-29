@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}!</p>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

@endsection
