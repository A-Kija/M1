@foreach ($books as $book)
  <a href="{{route('book.edit',[$book])}}">{{$book->title}}</a>
  <form method="POST" action="{{route('book.destroy', [$book])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  Autorius: {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
  <br>
@endforeach
