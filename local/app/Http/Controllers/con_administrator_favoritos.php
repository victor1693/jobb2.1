<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_administrator_favoritos extends Controller
{
    public function index()
    {
        $sql = "
        SELECT t1.*,t2.descripcion as decrip FROM tbl_favoritos t1
        INNER JOIN tbl_tipo_favorito t2 ON t2.id = t1.id_tipo
         WHERE t1.id_usuario =1";
        try {
            $vista        = View::make("administrator_favoritos");
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_favoritos WHERE id=" . $id . "";
        try {
            $datos = DB::delete($sql);
            return Redirect("adminfavoritos");
        } catch (Exception $e) {

        }
    }
}
