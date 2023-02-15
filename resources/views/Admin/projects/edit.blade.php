@extends('layouts.app')


@section('content')
    {{-- solo il superadmin, se è solo loggato può o contattarti per una collaborazione --}}
    <h1>form crea modifica il progetto di cui passo l'id</h1>


    {{-- rintraccia qualsiasi errore --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            I dati inseriti non sono validi:

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- QUESTA COSA è TROOOOOOOPPPO RIPTITIVA  --}}

    <div class="container w-75">
        <form class="row" action="{{ route('admin.projects.update', $project->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf


            {{-- title --}}
            <div class="input-container pb-2 col-12 col-md-5">
                <label class="form-label">TITOLO</label>
                <input type="text" class="form-control 
                    @error('title') is-invalid  @enderror"
                    name="title" value="{{ old('title', $project->title) }}">

                @error('title')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @elseif(old('title'))
                    <div class="valid-feedback"> ok </div>
                @enderror
            </div>

            {{-- type_id (dovrebbe poi diventare select) --}}
            <div class="input-container pb-2 col-12 col-md-3">
                <label class="form-label" for="type_id">Difficoltà</label>
                <select class="form-control selectpicker
                        @error('type_id') is-invalid @enderror"
                    id="type_id" name="type_id">



                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) === $type->id ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach

                </select>

                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('type_id'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>

            {{-- level_id --}}
            <div class="input-container pb-2 col-12 col-md-2">
                <label class="form-label" for="level_id">Difficoltà</label>
                <select class="form-control selectpicker
                        @error('level_id') is-invalid @enderror"
                    id="level_id" name="level_id">

                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}"
                            {{ old('level_id', $project->level_id) === $level->id ? 'selected' : '' }}>{{ $level->name }}
                        </option>
                    @endforeach
                </select>

                @error('level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('level_id'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>

            {{-- completed --}}

            <div class="input-container pb-2 col-12  col-sm-4 col-md-2 ps-3">
                <div class="form-check form-switch p-0">
                    <label class="form-check-label" for="completed">completato</label>

                    <div class="form-check form-switch pt-2">
                        <input type="hidden" name="completed" value="0">
                        <input class="form-check-input  @error('type') is-invalid @enderror " value="1" type="checkbox"
                            role="switch" id="completed" name="completed"
                            {{ old('completed', $project->completed) ? 'checked' : '' }}>
                    </div>
                </div>
                @error('completed')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @elseif(old('completed'))
                    <div class="valid-feedback"> ok </div>
                @enderror
            </div>


            {{-- linguaggi --}}

            <div class="input-container pb-2 col-12 ">
                <label class="form-label text-uppercase">Tecnologie:</label> <br>

                @foreach ($tecnologies as $tecnology)
                    <input type="checkbox" class="form-check-input    @error('tecnologies') is-invalid @enderror"
                        id="tecnology_{{ $loop->index }}" value="{{ $tecnology->id }}" name="tecnologies[]"
                        {{ $project->tecnologies->contains('id', $tecnology->id) ? 'checked' : '' }}>

                    <label class="form-check form-check-inline @error('tecnologies') is-invalid @enderror"
                        for="tecnology_{{ $loop->index }}">{{ $tecnology->name }}</label>
                @endforeach

                @error('tecnologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('tecnologies'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>

            {{-- linguaggi --}}
            <div class="input-container pb-2 col-12 col-md-8 ">
                <label class="form-label">linguaggi</label>
                <input type="text" class="form-control 
            @error('languages') is-invalid  @enderror"
                    name="languages" value="{{ old('languages', $project->languages) }}">

                @error('languages')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('languages'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>


            {{-- cover_img --}}
            <div class="input-container pb-2">
                <label class="form-label">IMMAGINE</label>
                <input type="file" class="form-control
                    @error('cover_img') is-invalid  @enderror"
                    name="cover_img">


                @error('cover_img')
                    <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>

            {{-- description --}}
            <div class="input-container pb-2">
                <label class="form-label">Descrizione</label>
                <textarea name="description" rows="3"
                    class="form-control 
                    @error('description') is-invalid @enderror">
                    {{ old('description', $project->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('description'))
                    <div class="valid-feedback">ok</div>
                @enderror
            </div>

            {{-- link --}}
            <div class="input-container pb-2 col-12 ">
                <label class="form-label">github url</label>
                <input type="url"
                    class="form-control 
            @error('languages') is-invalid @elseif(old('github_link')) is-valid @enderror"
                    name="github_link" value="{{ $errors->has('github_link') ? '' : old('github_link') }}">

                @error('github_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('github_link'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>

            {{-- opzioni --}}
            <div class="p-3">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Annulla</a>

                <button class="btn btn-secondary">salva le modifiche al progetto</button>


            </div>

        </form>
    </div>
@endsection
