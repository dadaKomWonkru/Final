<?php

namespace App\Http\Controllers;
use App\Models\book;
use Illuminate\Http\Request;



class BooksController extends Controller
{

    public function index ()  {


        $books = book::all();

        return view('books')->with("books",$books);}

    public function show(book $book)  {

        return view("book")->with("book",$book);

    }

    public function save(Request $request){
        $book = new book($request->all());

        $book->save();

        return redirect()->back();

    }

    public function create() {
        return view("create");        }

    public function edit(book $book){

        return view("edit")->with("book",$book);

    }

    public function update(Request $request,book $book){

        $book->update($request->all());

        return redirect()->route("book.show",$book->id);



    }
    public function delete(book $book){
        $book->delete();
        return redirect()->back();

    }

}
