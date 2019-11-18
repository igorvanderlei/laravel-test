@extends('layouts.mensagens')

@section('caixamensagem')
           <div class="card">
                <div class="card-header">Enviar Mensagem</div>

               <div class="card-body">
                   <form method="POST" action="{{ route('mensagem.send') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="destinatario" class="col-md-4 col-form-label text-md-right">Destinatário</label>

                           <div class="col-md-8">
                               <input id="destinatario" type="text" class="form-control @error('destinatario_id') is-invalid @enderror" name="destinatario" value="{{ old('destinatario') }}" required  autofocus />

                               @error('destinatario_id')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="titulo" class="col-md-4 col-form-label text-md-right">Título</label>

                           <div class="col-md-8">
                               <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required  autofocus />

                               @error('titulo')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="texto" class="col-md-4 col-form-label text-md-right">Mensagem</label>

                           <div class="col-md-8">
                               <textarea id="texto" size="5" class="form-control @error('texto') is-invalid @enderror" name="texto" required  autofocus >{{ old('texto') }}</textarea>

                               @error('texto')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>




                       <div class="form-group row mb-0">
                           <div class="col-md-8 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   Enviar
                               </button>
                           </div>
                       </div>
                   </form>
               </div>


           </div>
@endsection
