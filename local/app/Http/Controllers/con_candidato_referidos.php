<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_candidato_referidos extends Controller
{
    public function index()
    {
        $vista = View::make("candidato_referidos");
        $sql   = "SELECT * FROM tbl_usuarios WHERE token_referido='" . session()->get("cand_token") . "'";
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }

    }
}
