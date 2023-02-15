@extends('layouts.app')

@section('content')
    {{-- solo il superadmin, se è solo loggato può o contattarti per una collaborazione --}}
    <h1>form crea progetto che rimanda allo store</h1>


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
        <form class="row" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- title --}}
            <div class="input-container pb-2 col-12 col-md-5">
                <label class="form-label">TITOLO</label>
                <input type="text"
                    class="form-control 
                    @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                    name="title" value="{{ $errors->has('title') ? '' : old('title') }}">

                @error('title')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @elseif(old('title'))
                    <div class="valid-feedback"> ok </div>
                @enderror
            </div>



            {{-- type --}}
            <div class="input-container pb-2 col-12 col-md-3">
                <label class="form-label" for="type_id">Tipologia</label>
                <select
                    class="form-control
                    @error('type_id') is-invalid @elseif(old('type_id')) is-valid @enderror"
                    id="type_id" name="type_id">

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') ? 'selected' : '' }}>{{ $type->name }}
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
                <select
                    class="form-control
            @error('level_id') is-invalid @elseif(old('level_id')) is-valid @enderror"
                    id="level_id" name="level_id">

                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" {{ old('level_id') ? 'selected' : '' }}>{{ $level->name }}
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
                        {{-- 2 imput per raccogliere true o false subito --}}
                        <input type="hidden" name="completed" value="0">
                        <input
                            class="form-check-input @error('type') is-invalid @elseif(old('type')) is-valid @enderror "
                            value="1" type="checkbox" role="switch" id="completed" name="completed"
                            {{ old('completed', 1) ? 'checked' : '' }}>

                    </div>
                </div>
                @error('type')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @elseif(old('type'))
                    <div class="valid-feedback"> ok </div>
                @enderror
            </div>


            {{-- linguaggi --}}

            <div class="input-container pb-2 col-12 ">
                <label class="form-label text-uppercase">Tecnologie:</label> <br>

                @foreach ($tecnologies as $tecnology)
                    <input type="checkbox" 
                    class="form-check-input    @error('tecnologies') is-invalid @enderror"
        
                        id="tecnology_{{ $loop->index }}"
                        value="{{ $tecnology->id }}"
                        name="tecnologies[]"
                    
                        {{ in_array($tecnology->id, old('tecnologies', [])) ? 'checked' : '' }}>

                    <label class="form-check form-check-inline @error('tecnologies') is-invalid @enderror"
                        for="tecnology_{{ $loop->index }}"
                        >{{ $tecnology->name }}</label>
                @endforeach

                @error('tecnologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @elseif(old('tecnologies'))
                    <div class="valid-feedback">ok </div>
                @enderror
            </div>


            {{-- cover_img --}}
            <div class="input-container pb-2">
                <label class="form-label">IMMAGINE</label>
                <input type="file" class="form-control
                    @error('cover_img') is-invalid  @enderror"
                    name="cover_img" value="{{ old('cover_img') }}">


                @error('cover_img')
                    <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>

            {{-- description --}}
            <div class="input-container pb-2">
                <label class="form-label">Descrizione</label>
                <textarea name="description" cols="30" rows="3"
                    class="form-control 
                    @error('description') is-invalid @elseif(old('description')) is-valid @enderror">
                    {{ old('description') }}</textarea>

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

                <button class="btn btn-secondary">crea progetto</button>


            </div>

        </form>
    </div>
@endsection

{{-- nserire un suggerimento --}}
