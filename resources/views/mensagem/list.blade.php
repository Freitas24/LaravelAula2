<h1>Lista de mensagens</h1>
<hr>
@foreach($mensagens as $mensagem)
	<h3>{{$mensagem->scheduledto}}</h3>
	<p><a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	<p>{{$mensagem->autor}}</p>
	<br>
@endforeach
