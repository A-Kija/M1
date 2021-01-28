@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header red-header">Autorių sąrašas</div>

               <div class="card-body">
                  <a href="{{route('author.index', ['sort'=>'name'])}}" data-sort="name">Pagal Vardą</a>
                  <a href="{{route('author.index', ['sort'=>'surname'])}}" data-sort="surname">Pagal Pavardę</a>
                  <a href="{{route('author.index')}}" data-sort="clear">X</a>
                  <hr>


                  <ul class="list-group" id="authors-list">


                  @include('author.authors_list')

                  <ul>



               </div>
           </div>
       </div>
   </div>
</div>
@endsection











