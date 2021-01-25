<form method="POST" action="{{route('book.store')}}">
   Title: <input type="text" name="book_title"><br><br>
   ISBN: <input type="text" name="book_isbn"><br><br>
   Pages: <input type="text" name="book_pages"><br><br>
   About: <textarea name="book_about"></textarea><br><br>
   <select name="author_id">
    <option value="0">Pasirinkite autorių</option>
       @foreach ($authors as $author)
           <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
       @endforeach
</select><br><br><br>
   @csrf
   <button type="submit">ADD</button>
</form>