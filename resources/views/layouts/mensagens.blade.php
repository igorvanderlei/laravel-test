@extends('layouts.app')

@section('content')
    <div class="container">
        {{ __('auth.welcome', ['name' => Auth::user()->nome]) }}
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="list-group">
                    <a class='list-group-item list-group-item-action font-weight-bolder' href="{{route("mensagem.create")}}">
                        Escrever
                    </a>
                    <a class='list-group-item list-group-item-action @if($caixa == "inbox") active @endif' href="{{route("home", ['caixa' => 'inbox'])}}">
                        Entrada
                        <span class="badge badge-pill badge-primary pull-right ">{{ Auth::user()->caixaEntrada->count() }}</span>
                    </a>
                    <a class="list-group-item list-group-item-action @if($caixa == "sent") active @endif"  href="{{route("home", ['caixa' => 'sent'])}}">
                        Saída
                        <span class="badge badge-pill badge-primary pull-right">{{ Auth::user()->caixaSaida->count() }}</span>
                    </a>
                </div>

            </div>
            <div class="col-md-9">
                @yield('caixamensagem')
            </div>
        </div>
    </div>
@endsection
