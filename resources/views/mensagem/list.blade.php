<h1>Lista de mensagens</h1>
<hr>
@foreach($mensagens as $msg)
	<h3>{{$msg->autor}}</h3>
	<p>{{$msg->titulo}}</p>
	<p>{{$msg->texto}}</p>
	<br>
@endforeach