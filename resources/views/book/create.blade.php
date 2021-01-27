@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Book</div>

               <div class="card-body">
                 <form method="POST" action="{{route('book.store')}}">

 <div class="form-group">
    <label>Title:</label>
    <input type="text" name="book_title" class="form-control">
    <small class="form-text text-muted">Enter new book title.</small>
  </div>

   <div class="form-group">
    <label>ISBN:</label>
    <input type="text" name="book_isbn" class="form-control">
    <small class="form-text text-muted">Enter new book ISBN code.</small>
  </div>


   <div class="form-group">
    <label>Pages:</label>
    <input type="text" name="book_pages" class="form-control">
    <small class="form-text text-muted">Enter books page count.</small>
  </div>

     <div class="form-group">
    <label>About:</label>
    <textarea name="book_about" class="form-control" id="summernote"></textarea>
    <small class="form-text text-muted">Write something about new book.</small>
  </div>

  <script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>


       <div class="form-group">
    <label>Author:</label>
       <select name="author_id" class="form-control">
    <option value="0">Pasirinkite autorių</option>
       @foreach ($authors as $author)
           <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
       @endforeach
</select>
    <small class="form-text text-muted">Please select book author.</small>
  </div>

<button type="submit" class="btn btn-primary">ADD</button>
   


@csrf
</form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


