@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Author Edit</div>

               <div class="card-body">
                 <form method="POST" action="{{route('author.update',[$author])}}" enctype="multipart/form-data">
   Name: <input type="text" name="author_name" value="{{old('author_name', $author->name)}}">
   Surname: <input type="text" name="author_surname" value="{{old('author_surname', $author->surname)}}">
   Le Portret <input type="file" name="author_portret"><br><br>
   @if($author->photo) 
   <img style="height: 100px;" src="{{asset('portrets').'/'.$author->photo}}" alt="{{$author->name}}">
   @else
   Portreto nėra
   @endif
   @csrf
   <button type="submit">EDIT</button>
</form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection



