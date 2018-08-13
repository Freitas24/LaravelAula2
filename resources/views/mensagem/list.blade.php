<h1>Lista de mensagens</h1>
<hr>
@foreach($mensagens as $mensagem)
	<p><a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	<p>{{$mensagem->autor}}</p>
	<br>
@endforeach
