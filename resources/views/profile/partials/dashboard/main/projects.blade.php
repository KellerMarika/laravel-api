<section class="portfolio">


    <div class="container">
        <h1>pannello di controllo portfolio</h1>

        <div class=" count container row">
            <div class="col-md-3">
                <div class="card projects d-flex p-2">
                    <div class="w-75 fs-5 fw-bold"><span class="count  ">{{ $projects->count() }}</span> progetti
                        realizzati</div>
                    <ion-icon class="card-icon" name="extension-puzzle-outline"></ion-icon>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card tecnologies d-flex text-primary p-2">
                    <div class="w-75 fs-5 fw-bold"><span class="count  ">{{ $tecnologies->count() }}</span> tecnologie
                        disponibili</div>
                    <ion-icon class="card-icon" name="color-filter-outline"></ion-icon>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card types d-flex text-primary p-2">
                    <div class="w-75 fs-5 fw-bold"><span class="count  ">{{ $types->count() }}</span> modalità di
                        progettazione</div>

                    <ion-icon class="card-icon" name="build-outline"></ion-icon>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card levels d-flex text-primary p-2">
                    <div class="w-75 fs-5 fw-bold"><span class="count  ">{{ $levels->count() }}</span> livelli di
                        difficoltà</div>
                    <ion-icon class="card-icon" name="options-outline"></ion-icon>
                </div>

            </div>
        </div>


        {{-- tecnologies --}}
        <div class="tecnologies mt-4 text-end">
            <h2 class="text-center">tecnologies</h2>
            <table class="table table-striped text-start">
                <tr class="bg-primary ">

                    <th scope="col" class="text-light">name</th>
                    <th scope="col"class="text-light">modify</th>
                    <th scope="col"class="text-light">projects were is employed</th>
                    <th scope="col"class="text-light">Handle</th>
                </tr>
                @foreach ($tecnologies as $tecnology)
                    <tr>
                        <td>{{ $tecnology->name }}</td>
                        <td>

                            <form class="row p-2" action="{{ route('admin.tecnologies.update', $tecnology->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <input type="text" class="form-control col @error('name') is-invalid @enderror"
                                    id="tecnology_{{ $loop->index }}" value="{{ old('name', $tecnology->name) }}"
                                    name="name">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @elseif(old('name'))
                                    <div class="valid-feedback">ok </div>
                                @enderror
                                <div class=" col d-flex">
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Annulla</a>

                                    <button class="btn btn-secondary">salva</button>

                                    @php
                                        $route = 'admin.tecnologies.destroy';
                                        $element_id = $tecnology->id;
                                    @endphp
                                    @include('profile.partials.destroy-btn', ['route', 'element_id'])

                                </div>
                            </form>

                        </td>

                        <td>{{ $tecnology->projects->count() }}</td>
                        <td>

                            <ion-icon class="btn btn-primary" name="create-outline"></ion-icon>


                            <ion-icon class="btn btn-primary" name="close-outline"></ion-icon>
                            </ion-icon>

                        </td>
                    </tr>
                @endforeach
            </table>

            <form class="row p-2" action="{{ route('admin.tecnologies.store', $tecnology->id) }}"
             method="POST" enctype="multipart/form-data">
             @csrf

             <input type="text" class="form-control col @error('name') is-invalid @enderror"
                 id="tecnology" value="{{ old('name', $tecnology->name) }}"
                 name="name">

             @error('name')
                 <div class="invalid-feedback">{{ $message }}</div>
             @elseif(old('name'))
                 <div class="valid-feedback">ok </div>
             @enderror
             <div class=" col d-flex">
                 <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Annulla</a>

                 <button class="btn btn-secondary">salva</button>

             </div>
         </form>
            <button class="btn btn-primary ">add one +</button>
            
        </div>
    </div>
    {{-- 
    @dump($projects)
    @dump($tecnologies)
    @dump($types)
    @dump($levels)



 --}}
</section>
