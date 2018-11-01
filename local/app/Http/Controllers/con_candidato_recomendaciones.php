<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_candidato_recomendaciones extends Controller
{
    public function index()
    {
        $vista = View::make("candidato_recomendaciones");
        $sql   = "
      SELECT t1.*,t2.descripcion as estatus FROM `tbl_recomendaciones` t1
    LEFT JOIN tbl_estatus_recomendaciones t2 ON t2.id = t1.id_estatus
    WHERE t1.id_usuario =" . session()->get('cand_id') . "";
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }

    }

    public function recomendar()
    {
        $sql = "INSERT INTO tbl_recomendaciones
      VALUES(null," . session()->get("cand_id") . ",1,0,'" . $_POST['descripcion'] . "',null)";
        try {
            DB::insert($sql);
            return redirect("candirecomendaciones");
        } catch (Exception $e) {

        }
    }
}
