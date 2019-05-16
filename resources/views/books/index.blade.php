@extends('layouts.app')

@section('content')

<br>

<div class="card">
  	<h5 class="card-header">Books
  		<a class="btn btn-success" href="{{ url('books/create') }}">Nuevo</a></h5>
  	
  	<div class="card-body">
    
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Autor</th>
              <th>Status</th>
              <th>Usuario</th>
              <th>Opciones</th>
            </tr>
        </thead>
        
        <tbody class="text-center">
            @forelse($books as $book)
		    <tr>
	            <td>{{ $book->id }}</td>
	            <td>{{ $book->name }}</td>
	            <td>{{ $book->autor }}</td>
	            <td>
	            	@if($book->status === 0)
                        <span class="badge badge-success">Disponible</span>
                    @else
                    	<span class="badge badge-danger">Prestado</span>
                    @endif
	            	
	            </td>
	            <td>
	            	@if($book->user)
                        {{ $book->user->name }}
                    @else
                    	No tiene prestamo
                    @endif
	            </td>
	           	<td>
		            
					@if($book->status === 0)
                        <form method="POST" action="{{route('prestar', $book->id)}}">
			         		@csrf
			         		@method('put')
			         		<input type="submit" class="btn btn-sm btn-danger" value="Prestar">
			         	</form>
                    @else

                    	@if(auth()->user()->id === $book->user_id)
                        	<form method="POST" action="{{route('prestar', $book->id)}}">
			         		  @csrf
			         		  @method('put')
			         		  <input type="submit" class="btn btn-sm btn-success" value="Devolver">
			         	   </form>
			         	@endif                       
						
                    @endif

                    <a href="{{route('books.show', $book->id)}}" class="btn btn-sm btn-primary">Detalles
					</a>	


		        </td>
		    </tr>
                
            @empty
			<tr>
                <td colspan="5">
                    No se encontraron registros
                </td>
            </tr>
                 
            @endforelse
                                                    
        </tbody>
    </table>
    {{ $books->links() }}    
  </div>
</div>
@endsection