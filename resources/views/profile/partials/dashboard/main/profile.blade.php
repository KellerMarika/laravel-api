<section class="">




    <h1>pannello di controllo utente</h1>
    {{--  <h4 class="text-dark"> {{$user}}</h4> --}}
    <h4 class="text-dark"> {{ $user->name }}</h4>
    <h4 class="text-dark"> {{ $user->surname }}</h4>
    <h4 class="text-dark"> {{ $user->email }}</h4>

    @dump($user->account)
    {{-- <h4 class="text-dark"> {{$user->account}}</h4> --}}
    @if ($user->account)
        <h4 class="text-dark"> {{ $user->account->profile_img }}</h4>
        <h4 class="text-dark"> {{ $user->account->cover_img }}</h4>
        <h4 class="text-dark"> {{ $user->account->primary_color }}</h4>
        <h4 class="text-dark"> {{ $user->account->secondary_color }}</h4>
    @endif


    @dump($user->userDetail)
    @if ($user->userDetail)
        <h4 class="text-dark"> {{ $user->userDetail->birth_date }}</h4>
        <h4 class="text-dark"> {{ $user->userDetail->gender }}</h4>



        @if ($user->userDetail->address)
            <h4 class="text-dark"> {{ $user->userDetail->address->route_name }}</h4>
            <h4 class="text-dark"> {{ $user->userDetail->address->route_number }}</h4>
            <h4 class="text-dark"> {{ $user->userDetail->address->city_name }}</h4>
            <h4 class="text-dark"> {{ $user->userDetail->address->zip_code }}</h4>
            <h4 class="text-dark"> {{ $user->userDetail->address->country_name }}</h4>
            <h4 class="text-dark"> {{ $user->userDetail->address->country_code }}</h4>
            @dump($user->userDetail->address)
        @endif
    @endif



</section>
