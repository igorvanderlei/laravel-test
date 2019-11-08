@extends('layouts.mensagens')

@section('caixamensagem')
           <div class="card">
                <div class="card-header">@if($caixa == "sent") Caixa de Saída @else Caixa de Entrada @endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>@if($caixa == "sent") Destinatário @else Remetente @endif</th>
                            <th>Titulo</th>
                            <th>Data</th>
                        </tr>
                        </thead>

                    @foreach($mensagens as $mensagem)
                            <tr>
                                @if($caixa == "sent")
                                    <td>{{$mensagem->destinatario->nome}}</td>
                                @else
                                    <td>{{$mensagem->funcionario->nome}}</td>
                                @endif
                                <td>{{$mensagem->titulo}}</td>
                                <td>{{date('d/M/y H:i:s', strtotime($mensagem->created_at))}}</td>
                            </tr>
                    @endforeach
                    </table>
                    </div>
                </div>
            </div>
@endsection
