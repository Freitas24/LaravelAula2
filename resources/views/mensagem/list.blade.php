<h1>Lista de mensagens</h1>
<hr>
<!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif

@foreach($mensagens as $mensagem)
	<h3>{{$mensagem->scheduledto}}</h3>
	<p><a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	<p>{{$mensagem->autor}}</p>
	  @auth
	<a href="/mensagens/{{$mensagem->id}}">Visualizar</a> 
	<a href="/mensagens/{{$mensagem->id}}/edit">Editar</a> 
	<a href="/mensagens/{{$mensagem->id}}/delete">Deletar</a> 
	<br>
	@endauth
	<br>
@endforeach

<br>
<br>

 @auth
<a href="/mensagens/create">Criar Nova Mensagem</a>
@endauth