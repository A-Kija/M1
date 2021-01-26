<ul>
@foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
@endforeach
</ul>


<form method="POST" action="{{route('author.store')}}">
   Name: <input type="text" name="author_name" value="{{old('author_name')}}">
   Surname: <input type="text" name="author_surname" value="{{old('author_surname')}}">
   @csrf
   <button type="submit">ADD</button>
</form>