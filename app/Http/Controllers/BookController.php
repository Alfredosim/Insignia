<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show list books.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        
        $books = Book::with('user')->orderBy('id', 'desc')->paginate(10);
        
        
        return view('books.index', [
                        'books'   => $books
                    ]);        
    }
 

    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;

        $book->name = $request->input('name');
        $book->autor = $request->input('autor');
        $book->status = 0;
     
                        
        $book->save();

        
        return Redirect::to('/books');
    }

    /**
     * Show a specific libro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('books.show', ['book' => Book::findOrFail($id)]);

    }

    /**
     * Muestra el formulario para editar un libro especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);  
        
        return view('books.edit', ['book' => $book]);
        
    }

    /**
     * Actualiza un libro especifico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = Book::findOrFail($id);
       
        if ($request->input('name') != $book->name) {
            $book->name = $request->input('name');
        }


        if ($request->input('autor') != $book->autor) {
            $book->autor = $request->input('autor');
        }

        
        $book->update();
 

        return redirect()->route('books.show', $id);
    }

    /**
     * Eliminar un libro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        
       	$book->destroy();  

        return redirect()->back();
        
    }

    /**
     * Presta/devuelve un libro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function prestar($id)
    {
        $book = Book::findOrFail($id);
        

        if ($book->status === 0) {
        	$book->status = 1;
        	$book->user_id = Auth()->user()->id;    
        } else {
        	$book->status = 0;
       		$book->user_id = null;  
        }      	  

        $book->update();        
        
        return Redirect::to('/books');
        
    }
}
