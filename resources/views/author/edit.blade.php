<ul>
@foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
@endforeach
</ul>


<form method="POST" action="{{route('author.update',[$author])}}">
   Name: <input type="text" name="author_name" value="{{old('author_name', $author->name)}}">
   Surname: <input type="text" name="author_surname" value="{{old('author_surname', $author->surname)}}">
   @csrf
   <button type="submit">EDIT</button>
</form>