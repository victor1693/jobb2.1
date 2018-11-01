<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_candidato_favoritos extends Controller
{
    public function index()
    {
        $vista = View::make("candidatos_favoritos");
        $sql   = "SELECT t1.*,t2.descripcion as tipo from tbl_favoritos t1
        LEFT JOIN tbl_tipo_favorito t2 ON t1.id_tipo = t2.id WHERE t1.id_usuario=" . session()->get('cand_id') . "";
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }

    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tbl_favoritos  WHERE id_usuario=" . session()->get('cand_id') . " AND id=" . $id . "";
        try {
            DB::delete($sql);
            return Redirect("candifavoritos");
        } catch (Exception $e) {

        }

    }

    public function setFavorite()
    {
        $tipo        = "";
        $url         = "";
        $titulo      = "";
        $descripcion = "";
        $id          = "";
        if ($_POST["tipo"] == 3) {
            $tipo        = 3;
            $url         = "detalleoferta/" . $_POST['id'];
            $titulo      = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id          = $_POST['id'];
        }

        //Verificamos que el usuario no le ha dado favorito a ese id
        $sql     = "SELECT count(*) as cantidad FROM tbl_favoritos WHERE id_usuario = " . session()->get('cand_id') . " AND id_referencia =" . $id . " AND id_tipo=" . $tipo . "";
        $datos   = DB::select($sql);
        $bandera = 0;
        if ($datos[0]->cantidad == 0) {
            $bandera = 1;
        }
        if ($bandera) {
            $sql = "INSERT INTO tbl_favoritos
            VALUES(null,
            " . $id . ",
            " . session()->get('cand_id') . ",
            " . $tipo . ",
            '" . $url . "',
            '" . $titulo . "',
            '" . $descripcion . "',
            null)";

            try {
                DB::insert($sql);
                echo "1";
            } catch (Exception $e) {
                echo "0";
            }
        } else {
            echo "2";
        }
    }
}
