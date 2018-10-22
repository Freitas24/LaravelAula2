@extends('layouts.app')

@section('content')

<h1>Lista de Atividades</h1>
<hr>
  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif
  
@foreach($atividades as $atividade)
	<p class="h5">{{\Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')}}</p>
	<p class="h2"><a href="/atividades/{{$atividade->id}}"><span class="badge badge-secondary">{{$atividade->title}}</span></a></p>
	<p>{{$atividade->description}}</p>
  @auth
  <a class="btn btn-primary btn-sm" href="/atividades/{{$atividade->id}}">Visualizar</a> 
  <a class="btn btn-primary btn-sm" href="/atividades/{{$atividade->id}}/edit">Editar</a> 
  <a class="btn btn-primary btn-sm" href="/atividades/{{$atividade->id}}/delete">Deletar</a> 
  @endauth
	<br>
  <br>
  <br>
  @endforeach

<br>

@auth
<a class="btn btn-outline-primary btn-lg" href="/atividades/create">Criar Nova Atividade</a>
@endauth



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->

@endsection