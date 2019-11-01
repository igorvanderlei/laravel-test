@if($errors->any())
<strong style="color: red">Erro ao cadastrar: </strong><br/>
@endif
<form action="funcionario.create" method="post">
@csrf
Nome: <input type="text" name="nome" value="{{old('nome')}}" /> <br/>
@error('nome')
<strong style="color: red">{{ $message }}</strong><br/>
@enderror

Departamento: <select name="departamento_id">
<option value="">Escolha um departamento</option>
@foreach($departamentos as $dep) 
@if(old('departamento_id') == $dep->id)
<option value='{{$dep->id}}' selected='selected'>{{$dep->nome}}</option>
@else
<option value='{{$dep->id}}'>{{$dep->nome}}</option>
@endif
@endforeach
</select> <br/>
@error('departamento_id')
<strong style="color: red">{{ $message }}</strong><br/>
@enderror

<input type="submit" value="cadastrar" />

</form>

