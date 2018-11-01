<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;

class con_administrator_contacto extends Controller
{
    public function index()
    {
    	return View('administrator_contacto');
    }

    public function ver()
    {
    	return View('administrator_contacto_ver');
    }
}
