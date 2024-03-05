<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\book;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        $bebek = $request->bebek;
        $books = Book::where('title', 'like', "%" . $bebek . "%")->paginate(5);
        return view('dashboard'
        , ['books' => $books], compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('book.index', ['results' => $ayam]);
    }

    public function index()
    {
        // dd(book::get());
        return view('dashboard', [
            "books" => book::get(),
            "authors" => author::get(),
            "publishers" => publisher::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'authors' => author::get(),
            'publishers' => publisher::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->photo);
        $this->validate($request, [
            "title" => ["required"],
            "year" => ["required"],
            "author_id" => ["required"],
            "publisher_id" => ["required"],
            "photo" => ['image']
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('/photos');
        }
        book::create([
            "title" =>  $request->title,
            "year" => $request->year,
            "author_id" => $request->author_id,
            "publisher_id" => $request->publisher_id,
            "cover" => $photo
        ]);

        return to_route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("show", [
            "books" => book::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit', [
            'books' => book::find($id),
            'authors' => author::get(),
            'publishers' => publisher::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = book::find($id);

        // $photo = null;

        if ($request->hasFile('photo')) {
            // if (storage::exists($book->photo)){
            //     storage::delete($book->photo);
            // }
            $photo = $request->file('photo')->store('photos');
        }

        $this->validate($request, [
            "title" => ["required"],
            "year" => ["required"],
            "author_id" => ["required"],
            "publisher_id" => ["required"],
            "photo" => ['image']
        ]);

        $book->update([
            "title" =>  $request->title,
            "year" => $request->year,
            "author_id" => $request->author_id,
            "publisher_id" => $request->publisher_id,
            "cover" => $photo
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        book::find($id)->delete();
        return redirect()->route('dashboard');
    }
}
