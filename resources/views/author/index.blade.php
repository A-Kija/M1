@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header red-header">Autorių sąrašas</div>

               <div class="card-body">
                  <a href="{{route('author.index', ['sort'=>'name'])}}">Pagal Vardą</a>
                  <a href="{{route('author.index', ['sort'=>'surname'])}}">Pagal Pavardę</a>
                  <a href="{{route('author.index')}}">X</a>
                  <hr>
                  <ul class="list-group">
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
                  <ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection











