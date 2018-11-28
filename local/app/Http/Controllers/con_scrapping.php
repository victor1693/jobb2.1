<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_scrapping extends Controller
{
    public function index()
    {
    	$vista=View::make("scrapping");
    	return $vista;
    }

      public function detalle($url)
    {
    	$vista=View::make("detalle-scrapping");
    	return $vista;
    }
}
