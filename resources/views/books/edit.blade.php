@extends('layouts.app')
@section('content')
<br>
<div class="card">
    <h5 class="card-header">Nuevo Book</h5>
    
    <div class="card-body">

        <form method="POST" action="{{ route('books.update', $book->id)}}" autocomplete="off">

        @csrf
        @method('put')

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$book->name}}" required>

                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
                
            </div>

            <div class="form-group{{ $errors->has('autor') ? ' has-error' : '' }}">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" name="autor" value="{{$book->autor}}" required>

                @if ($errors->has('autor'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('autor') }}</strong>
                    </div>
                @endif
            </div>
            
                        
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a class="btn btn-danger" href="{{ url('books') }}" role="button">
                Cancelar

            </a>

        </form>
  </div>
</div>
@endsection