<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class authorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authorr.show', [
            "authors" => author::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authorr.create', [
            'authors' => author::get(),
            // 'publishers' => publisher::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => ["required"],
            "photo" => ['image']
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }
        author::create([
            "name" =>  $request->name,
            "photo" => $photo
        ]);

        return to_route("authorr.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('authorr.edit', [
            'authors' => author::find($id),
            // 'authors' => author::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = author::find($id);

        $photo = null;

        if ($request->hasFile('photo')) {
            // if (Storage::exists($author->photo)){
            //     Storage::delete($author->photo);
            // }
            $photo = $request->file('photo')->store('photos');
        }

        $this->validate($request, [
            "name" => ["required"],
            "photo" => ['image']
        ]);

        $author->update([
            "name" =>  $request->name,
            "photo" => $photo
        ]);

        return redirect()->route('authorr.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        author::find($id)->delete();
        return redirect()->route('authorr.index');
    }
}
