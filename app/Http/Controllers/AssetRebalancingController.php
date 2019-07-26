<?php

namespace App\Http\Controllers;

use App\AssetRebalancing;
use Illuminate\Http\Request;

class AssetRebalancingController extends Controller
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
     * @param  \App\AssetRebalancing  $assetRebalancing
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request)
        {
          $data['Assets'] = "string";
          $data['current allocation INR'] = "string";
          $data['current allocation % '] = "string";
          $data['our recommendation INR'] = "string";
          $data['our recommendation %'] = "string";
          $data['current allocation INR'] = "string";
          $data['your allocation INR'] = "string";
          $data['your allocation %'] = "string";
          
        
        return response()->json( $data,      
        200);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssetRebalancing  $assetRebalancing
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetRebalancing $assetRebalancing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssetRebalancing  $assetRebalancing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetRebalancing $assetRebalancing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssetRebalancing  $assetRebalancing
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetRebalancing $assetRebalancing)
    {
        //
    }
}
