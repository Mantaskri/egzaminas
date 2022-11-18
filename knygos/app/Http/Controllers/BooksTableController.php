<?php

namespace App\Http\Controllers;

use App\Models\books_table;
use App\Http\Requests\Storebooks_tableRequest;
use App\Http\Requests\Updatebooks_tableRequest;

class BooksTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebooks_tableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebooks_tableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books_table  $books_table
     * @return \Illuminate\Http\Response
     */
    public function show(books_table $books_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books_table  $books_table
     * @return \Illuminate\Http\Response
     */
    public function edit(books_table $books_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebooks_tableRequest  $request
     * @param  \App\Models\books_table  $books_table
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebooks_tableRequest $request, books_table $books_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books_table  $books_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(books_table $books_table)
    {
        //
    }
}
