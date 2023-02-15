@extends('layouts.app')
@section('content')
    @php
        $title = ' SHOW project n°' . $project->id;
    @endphp

@section('title', $title)
{{-- 
@dump($project->type->name)
@dump($project->level->name)
@dump($project) --}}
<section>
    <div class="projects-index container">
        <h2>SHOW projects:</h2>
        <div class="row ">

            <div class="col-md-9 ">
                <div class="card overflow-hidden shadow d-flex">
                    <div
                        class="card-id position-absolute rounded-circle d-flex justify-content-center align-items-center fs-3 fw-bold m-1 end-0 top-0 me-2">
                        {{ $project->id }}</div>

                    <img src="{{ asset('storage/' . $project->cover_img) }}" class="card-img"
                        alt="{{ $project->cover_img }}">
                    <div class="card-body ">

                        <div class="project-info">

                            <div class="d-flex shadow-sm">
                                <h2 class="card-title flex-fill text-uppercase">{{ $project->title }}</h2>
                                <small class="fw-bold text-end">
                                    <span class="type">{{ $project->type->name }}</span><br>
                                    <span class="level">{{ $project->level->name }}</span>
                                </small>

                            </div>

                            <small class="tecnology fw-bold text-end"> tecnologie Impiegte =>
                                {{ $project->tecnologies->isEmpty() ? 'nessun risultato' : $project->tecnologies->implode('name', ', ') }}</small>
                            <p class="card-text pt-3">{{ $project->description }}<small
                                    class="d-block text-end p-1 border-top">last update:
                                    {{ $project->updated_at }}</small></p>


                            <a href="#" class="btn mr-2"><i class="fas fa-link"></i> leave Comment!</a>
                            <a href="{{ $project->github_link }}" class="btn "><i class="fab fa-github"></i>
                                Github</a>

                            @php
                                $route = 'admin.projects.destroy';
                                $element_id = $project->id;
                            @endphp
                            @include('profile.partials.destroy-btn', ['route', 'element_id'])
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection
