<h2>Pliusavimo forma</h2>
<hr>
Istorija:<br>
@foreach($history as $r)
    {{$r->numb1}} + {{$r->numb2}} = {{$r->result}} <br>
@endforeach
<hr>
<form method="POST" action="{{route('show')}}">
<b>X:</b><input type="text" name="x"><br><br>
<b>Y:</b><input type="text" name="y"><br><br>
<button type="submit">+</button>
@csrf
</form>
@if($result)
Rezultatas: {{$result}}
@endif