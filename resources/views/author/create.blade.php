@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Author</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
                            Name: <input type="text" name="author_name" value="{{old('author_name')}}"><br><br>
                            Surname: <input type="text" name="author_surname" value="{{old('author_surname')}}"><br><br>
                            Le Portret <input type="file" name="author_portret"><br><br>
                            @csrf
                            <button type="submit">ADD</button>
                        </form>
                    </div>
                </div>
           </div>
       </div>
   </div>
</div>
@endsection



