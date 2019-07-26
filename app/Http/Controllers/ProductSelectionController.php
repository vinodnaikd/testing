<?php

namespace App\Http\Controllers;

use App\ProductSelection;
use Illuminate\Http\Request;

class ProductSelectionController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSelection  $productSelection
     * @return \Illuminate\Http\Response
     */
     public function show(Request $request)
        {
          $data['productname'] = "string";
          $data['scenario one products'] = "string";
          $data['amount '] = "string";
          $data['scenario two products'] = "string";
          
        
        return response()->json($data, 200);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSelection  $productSelection
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSelection $productSelection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSelection  $productSelection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSelection $productSelection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSelection  $productSelection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSelection $productSelection)
    {
        //
    }
}
