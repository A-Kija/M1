@foreach ($authors as $author)
<li class="list-group-item flex">
<div>
{{$author->name}} {{$author->surname}}

@if($author->photo) 
<img style="height: 100px;" src="{{asset('portrets').'/'.$author->photo}}" alt="{{$author->name}}">
@endif
</div>

<div>
<a href="{{route('author.edit', [$author])}}" class="btn btn-info">EDIT</a>
<form style="display: inline;" method="POST" action="{{route('author.destroy', [$author])}}">
@csrf
<button type="submit" class="btn btn-danger">DELETE</button>
</form>
<a href="{{route('author.pdf', [$author])}}" class="btn btn-info">GET PDF</a>

<a href="{{route('author.mail', [$author])}}" class="btn btn-info">SENT MAIL</a>
</div>
</li>
@endforeach