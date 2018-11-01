<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class con_administrator_dashboard extends Controller
{

    public function index()
    {

        $vista = View::make('administrator_dashboard');
        $sql_usuarios="SELECT count(id) as cantidad,tipo_usuario FROM tbl_usuarios GROUP BY tipo_usuario order by tipo_usuario ASC";
        $sql_publicaciones="SELECT count(*) as cantidad FROM tbl_publicacion";
        $sql_noticias="SELECT count(*) as cantidad FROM tbl_noticias";
        $sql_postulaciones="SELECT count(*) as cantidad FROM tbl_postulaciones";
        $sql_recomendaciones="SELECT count(*) as cantidad FROM tbl_recomendaciones";

        $vista->datos_usuario=DB::select($sql_usuarios);
        $vista->datos_publicaciones=DB::select($sql_publicaciones);
        $vista->datos_noticias=DB::select($sql_noticias);
        $vista->datos_postulaciones=DB::select($sql_postulaciones);
        $vista->datos_recomendaciones=DB::select($sql_recomendaciones);

         
        return $vista;
    }
}
