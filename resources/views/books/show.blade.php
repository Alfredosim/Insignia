@extends('layouts.app')
@section('content')
<br>
<div class="card">
    <h5 class="card-header">Book #{{ $book->id }} <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Editar</a></h5>
    
    <div class="card-body">

        <div class="form-group">
                <label for="name">Name</label>
                
                <p class="form-control"> {{ $book->name}}</p>
                
        </div>

        <div class="form-group">
            
            <label for="autor">Autor</label>

            <p class="form-control"> {{ $book->autor}}</p>

                
        </div>

        @if($book->user)
            <div class="form-group">
            
                <label for="autor">Libro prestamo a</label>

                <p class="form-control"> {{ $book->user->name }}</p>

                
            </div>

        @endif
        

        <div class="form-group">
            
            <label for="autor">Fecha de registro</label>

            <p class="form-control"> {{ $book->created_at}}</p>

                
        </div>

        <div class="form-group">
            
            <label for="autor">Ultimo prestamo</label>

            <p class="form-control"> {{ $book->updated_at }}</p>

                
        </div>
        

        <a class="btn btn-danger" href="{{ url('books') }}" role="button">
                Regresar

            </a>
            

   
  </div>
</div>
@endsection