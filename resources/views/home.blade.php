@extends('layouts.app')

@php
    $title = 'MarikaKeller.dev HOME';
@endphp

@section('title', $title)

@section('content')

    <div class="container text-end">
        @guest
            <h1>non sei nessuno</h1>

        @endguest

        @auth
            <h3>sei</h3>
            @if (Auth::user()->is_superadmin == true)
                <h1>SUPERADMIN {{ Auth::user()->name }}</h1>
            @else
                <h1>LOGGAT0 {{ Auth::user()->name }}</h1>
            @endif
        @endauth

    </div>

    @include('profile.partials.jumbotron')

@endsection
