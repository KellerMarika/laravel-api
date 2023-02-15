@extends('layouts.app')



@section('content')
    {{-- ciclo su argomento categoria --}}
    {{-- ciclo su projects quelli che corrispondono alla categoria --}}



    <section class="my-5">

        <div class="projects-index container">
            <h1 class="pb-3 text-uppercase">All projects:</h1>
            <div class="card-columns">
                <a href="{{ route('admin.projects.create') }}" class="add-project-btn card my-4 p-3 text-uppercase  overflow-hidden shadow">
                    <h2 class=" m-0"><i class ="fa fa-plus"></i> add new</h2>
                </a>
                @foreach ($projects as $project)
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="card  my-4 overflow-hidden shadow">

                        <div
                            class="card-id position-absolute rounded-circle d-flex justify-content-center align-items-center fs-3 fw-bold m-1 end-0 top-0 me-4 mt-4 me-md-3 mt-md-2">
                            {{ $project->id }}</div>

                        <img src="{{ asset('storage/' . $project->cover_img) }}" class="card-img-top "
                            alt="{{ $project->cover_img }}">
                        <div class="card-body p-0">

                            <h2 class="card-title flex-fill text-uppercase shadow-sm py-2 px-3">{{ $project->title }}
                            </h2>

                            <small class="fw-bold d-flex justify-content-between py-2 px-3">
                                <span class="type">{{ $project->type->name }}</span><br>
                                <span class="level">{{ $project->level->name }}</span>
                            </small>

                        </div>

                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{--     @foreach ($types as $type)
        <section>
            <div class="container">
                <h2>{{ $type->name }} Projects:</h2>
            </div>

        </section>
    @endforeach

    @foreach ($levels as $level)
        <section>
            <div class="container">
                <h2>{{ $level->name }} Projects:</h2>
            </div>

        </section>
    @endforeach --}}


    {{--     @dump($levels)
    @dump($types)
    @dump($projects) --}}
    <a href="{{ url('admin/projects/create') }}" class="btn btn-link">crea un nuovo progetto</a>
@endsection
