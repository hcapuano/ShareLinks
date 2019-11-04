@extends('layouts.app')

@section('content')
    <div class="content">
        @guest <!-- Redirige l'utilisateur vers le login s'il essai d'accéder aux dashboard -->
            {{redirect()->route('login')}}
        @endguest
        @auth <!-- Si l'utilisateur est bien connecté, alors afficher ce qu'il faut -->
            <div class="row justify-content-md-center mb-2">
                <div class="col-lg-10 col-sm-12 my-2">
                    @if(isset($state) && !empty($lastOne))
                        @include('dashboardElements.alert')
                    @endif
                    <div class="card">
                        <div class="card-header"><i class="icon-plus-circled"></i>{{ __('New shorten url') }}</div>
                        <div class="card-body">
                            @include('dashboardElements.createLinkForm')
                        </div>
                    </div>
                    <div class="card my-4">
                        <div class="card-body px-0">
                            <div class="row">
                                <div class="col">
                                    Name
                                </div>
                                <div class="col-3">
                                    Original url
                                </div>
                                <div class="col-3">
                                    Shortened url
                                </div>
                                <div class="col-1">
                                    Cliks
                                </div>
                                <div class="col">
                                    Date created
                                </div>
                            </div>
                            @include('dashboardElements.linksTable')
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection