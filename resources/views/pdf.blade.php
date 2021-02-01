<h1>PDF</h1>
{{$author->name}} {{$author->surname}}

@if($author->photo) 
<img style="height: 100px;" src="{{asset('portrets').'/'.$author->photo}}">
@endif