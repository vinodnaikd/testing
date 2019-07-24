<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* public function __construct(Route $route)
    {
    	Log::error('An informational message.');
        // specific code before init 
        parent::__construct($route);
        // specific code after init 
    }
    
    public function index1(Request $request)
    {
    	Log::error('An informational Index message.');
        // specific code before index execution
        parent::index($request); 
        // specific code after index execution
    }*/
}