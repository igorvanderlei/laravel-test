@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
    <div class="col-md-10">
    <div x="card" >
        <div class="card-header">Cadastrar Funcionário</div>

        <div class="card-body">
            <form method="POST" action="{{ route('funcionario.create') }}">
                @csrf

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                    <div class="col-md-8">
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required  autofocus />
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  autofocus />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmação do Password</label>

                    <div class="col-md-8">
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required  autofocus />
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Departamento</label>

                    <div class="col-md-8">
                        <select name="departamento_id" class="form-control @error('departamento_id') is-invalid @enderror" autofocus>
                            <option value="">Escolha um departamento</option>
                            @foreach($departamentos as $dep)
                                @if(old('departamento_id') == $dep->id)
                                    <option value='{{$dep->id}}' selected='selected'>{{$dep->nome}}</option>
                                @else
                                    <option value='{{$dep->id}}'>{{$dep->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('departamento_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            cadastrar
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    </div>
    </div>

@endsection
