@foreach ($authors as $author)
<li class="list-group-item flex">
<div>
{{$author->name}} {{$author->surname}}
</div>

<div>
<a href="{{route('author.edit', [$author])}}" class="btn btn-info">EDIT</a>
<form style="display: inline;" method="POST" action="{{route('author.destroy', [$author])}}">
@csrf
<button type="submit" class="btn btn-danger">DELETE</button>
</form>
</div>
</li>
@endforeach