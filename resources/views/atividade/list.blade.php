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
	<h3>{{$atividade->scheduledto}}</h3>
	<p><a href="/atividades/{{$atividade->id}}">{{$atividade->title}}</a></p>
	<p>{{$atividade->description}}</p>
  @auth
  <a href="/atividades/{{$atividade->id}}">Visualizar</a> 
  <a href="/atividades/{{$atividade->id}}/edit">Editar</a> 
  <a href="/atividades/{{$atividade->id}}/delete">Deletar</a> 
  @endauth
	<br>
  @endforeach

<br>

@auth
<a href="/atividades/create">Criar Nova Atividade</a>
@endauth



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->