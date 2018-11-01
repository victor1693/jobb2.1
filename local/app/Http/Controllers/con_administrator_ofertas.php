<?php

namespace App\Http\Controllers;

use View;

class con_administrator_ofertas extends Controller
{
    public function index()
    {
        return View("administrator_ofertas_ver");
    }
}
