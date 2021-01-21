<h2>Pliusavimo forma</h2>
<hr>
<form method="POST" action="{{route('do')}}">
<b>X:</b><input type="text" name="x"><br><br>
<b>Y:</b><input type="text" name="y"><br><br>
<button type="submit">+</button>
@csrf
</form>