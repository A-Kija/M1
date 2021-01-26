
<form action="{{route('book.index')}}" method="GET">
   <select name="author_id">
    <option value="0">Pasirinkite autorių</option>
       @foreach ($authors as $author)
           <option value="{{$author->id}}" @if($filter_id == $author->id) selected @endif>
            {{$author->name}} {{$author->surname}}
           </option>
       @endforeach
    </select>
    <button type="submit">FILTRUOTI</button>
    <a href="{{route('book.index')}}"><b>X</b></a>
</form>
<hr>
<form action="{{route('book.index')}}" method="GET">
    <input type="text" name="q" value="{{$q}}">
    <button type="submit">Ieskoti</button>
    <a href="{{route('book.index')}}"><b>X</b></a>
</form>
<hr>


@foreach ($books as $book)
  <a href="{{route('book.edit',[$book])}}">{{$book->title}}</a>
  <form method="POST" action="{{route('book.destroy', [$book])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  Autorius: {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
  <br>
@endforeach
