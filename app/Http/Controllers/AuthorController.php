<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Editorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function filter(Request $request){
        $authors = Author::all();
        $idEditorial[] = 0;
        if (isset($request->author_id) && $request->author_id != '%') {
            $libros1 = Book::where('author_id', $request->author_id)->get();

            if (isset($request->editorial_id) && $request->editorial_id != '%') {
                $libros = Book::where('author_id', $request->author_id)->where('editorial_id', $request->editorial_id)->paginate(5);
            }else {
                $libros = Book::where('author_id', $request->author_id)->paginate(5);
            }
            
            $libros->appends(['author_id' => $request->author_id,
                            'editorial_id' => $request->editorial_id,
                            'page'=>'1']);
        }else {
            $libros1 = Book::all();
            $libros = Book::paginate(5);
        }
        foreach ($libros1 as $libro) {
            $idEditorial[] = $libro->Editorial->id;
        }
        $editorials = Editorial::whereIn('id', $idEditorial)->get();
        return view('paginacion2', compact('authors', 'libros', 'editorials' ,'request'));
    }
}
