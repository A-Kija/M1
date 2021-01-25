@foreach ($authors as $author)
  {{$author->name}} {{$author->surname}} 
  <a href="{{route('author.edit', [$author])}}">EDIT</a>
<form style="display: inline;" method="POST" action="{{route('author.destroy', [$author])}}">
   @csrf
   <button type="submit" style="background: transparent; border: none;">DELETE</button>
</form>
<br>
@endforeach
