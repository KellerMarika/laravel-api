{{-- guet --}}

@extends('layouts.dashboard')

@section('content')
    <div class="dashboard-container d-flex justify-content-end">
    
            @include('profile.partials.dashboard.aside')
     


        @include('profile.partials.dashboard.main')
    </div>
@endsection
