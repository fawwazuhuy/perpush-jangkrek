<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use Illuminate\Http\Request;

class publishercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publisherr.show', [
            "publishers" => publisher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisherr.create', [
            'publishers' => publisher::get(),
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
            "address" => ["required"]
        ]);

        publisher::create([
            "name" =>  $request->name,
            "address" => $request->address
        ]);

        return to_route("publisherr.index");
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
        return view('publisherr.edit', [
            'publishers' => publisher::find($id),
            // 'publishers' => publisher::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publisher = publisher::find($id);


        $this->validate($request, [
            "name" => ["required"],
            "address" => ['required']
        ]);

        $publisher->update([
            "name" =>  $request->name,
            "address" => $request->address
        ]);

        return redirect()->route('publisherr.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        publisher::find($id)->delete();
        return redirect()->route('publisherr.index');
    }
}
