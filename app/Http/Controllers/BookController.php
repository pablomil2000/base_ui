<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Editorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(){
        $libros = Book::paginate(5);
        $authors = Author::all();
        return view('paginacion1', compact('libros', 'authors'));
    }

    public function filter(Request $request){

        $authors = Author::all();
        $editorials = Editorial::all();
        
        if (isset($request->author_id)) {
            $titulo = '%'.$request->titulo.'%';
            $libros = Book::where('author_id', 'like', $request->author_id)->
                            where('editorial_id', 'like', $request->editorial_id)->
                            where('price', $request->signo,  $request->price)->
                            where('title', 'like', $titulo)->paginate($request->porPag);
            $filtros['author_id'] = $request->author_id;
            
            $libros->appends(['author_id' => $request->author_id,
                            'titulo' => $request->titulo,
                            'editorial_id' => $request->editorial_id,
                            'signo' => $request->signo,
                            'price' => $request->price,
                            'porPag' => $request->porPag,
                            'page'=>'1']);
        }else {
            $libros = Book::paginate(5);
        }

        // var_dump($libros);
        // $libros->currentPage =1;

        return view('paginacion1', compact('libros', 'authors', 'editorials', 'request'));
    }
}
