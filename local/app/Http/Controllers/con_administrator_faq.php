<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_administrator_faq extends Controller
{
    public function index()
    {
        $sql   = "SELECT * FROM tbl_faq";
        $vista = View::make('administrator_preguntas_frecuentes');
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }

    }
    public function update()
    {
        $sql = "UPDATE tbl_faq SET editor='" . $_POST['editor_form'] . "',titulo='" . $_POST['titulo_form'] . "',descripcion='" . $_POST['descripcion_form'] . "' WHERE id=" . $_POST['id_pregunta'] . "";

        try {
            $datos = DB::update($sql);
            return Redirect("adminfag");
        } catch (Exception $e) {

        }

    }
    public function detalle_preguntas()
    {
        $sql   = "SELECT * FROM tbl_faq";
        $vista = View::make('faq');
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }

    }
    public function eliminar($id)
    {

        $sql = "DELETE FROM tbl_faq WHERE id=" . $id . "";

        try {
            DB::delete($sql);
            return Redirect("adminfag");
        } catch (Exception $e) {

        }
        return View("administrator_preguntas_frecuentes");
    }
    public function crear()
    {

        $sql = "INSERT INTO tbl_faq  VALUES(null,'" . $_POST['editor'] . "','" . $_POST['titulo'] . "','" . $_POST['detalle'] . "',null)";

        try {
            DB::insert($sql);
            return Redirect("adminfag");
        } catch (Exception $e) {

        }
        return View("administrator_preguntas_frecuentes");
    }
}
