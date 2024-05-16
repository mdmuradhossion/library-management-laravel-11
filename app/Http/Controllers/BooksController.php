<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Book::orderBy('id', 'desc')->get();
        return view('admin.books.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = Book::all();
        return view('admin.books.create',compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookname' => 'required|max:255',
            'category' => 'required',
            'author' => 'required',
            'isbn' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        $table = new Book();
        $table->bookName = $request->bookname;
        $table->catId = $request->category;
        $table->authorId = $request->author;
        $table->isbnNumber = $request->isbn;
        $table->bookPrice = $request->price;
        $table->save();
        return redirect()->back()->with('message', 'Create data successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Book::where('id',$id)->first();
        return view('admin.books.update',compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'bookname' => 'required|max:255',
            'category' => 'required',
            'author' => 'required',
            'isbn' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        $data['bookName'] = $request->bookname;
        $data['catId'] = $request->category;
        $data['authorId'] = $request->author;
        $data['isbnNumber'] = $request->isbn;
        $data['bookPrice'] = $request->price;

        Book::where('id',$request->id)->update($data);
        return redirect()->back()->with('message', 'Update data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Delete data successfully');
    }
}
