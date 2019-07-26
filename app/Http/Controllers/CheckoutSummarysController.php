<?php

namespace App\Http\Controllers;

use App\CheckoutSummarys;
use Illuminate\Http\Request;

class CheckoutSummarysController extends Controller
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
     * @param  \App\CheckoutSummarys  $checkoutSummarys
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data['product_id'] = "string";
	$data['product_totalcost']=(object)array(
                     "product_name" => "string",
                    "product_id" => "string",
                    "product_quantity" => "string",
                    "product_sum" => "string",
                    "product_cost" => "string"
	);
		$data['tax_amount'] = "string";
                 $data['gross_amount'] = "string";
                 $data['nav_price'] = "string";
                 $data['product_name'] = "string";
                 $data['product_cost'] = "string";
                 $data['sip_enable']  =  "0";
		$data['sip']=(object)Array(
		  "member_id" =>"string",
                  "frequency_tytpe" => "string",
                  "installment_amount" => "string",
                  "no_of_installments" => "string",
                  "folio_no" => "string");
            return response()->json([
             $data], 200);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckoutSummarys  $checkoutSummarys
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckoutSummarys $checkoutSummarys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckoutSummarys  $checkoutSummarys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckoutSummarys $checkoutSummarys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckoutSummarys  $checkoutSummarys
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckoutSummarys $checkoutSummarys)
    {
        //
    }
}
