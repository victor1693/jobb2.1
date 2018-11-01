<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;

class con_candidato_dashboard extends Controller
{
    public function dashboard(Request $request)
    {
    	$id_usuario = session()->get("cand_id");

        $vista = View::make('candidatos_dashboard');

        try {
        	$postulaciones = DB::select("SELECT COUNT(*) AS count FROM tbl_postulaciones WHERE id_usuario=$id_usuario");
        	$empresas_seguidas = DB::select("SELECT COUNT(*) AS count FROM tbl_candidato_empresas_seguidas WHERE id_usuario=$id_usuario ");
        	$list_empresas_seguidas = DB::select("SELECT ces.id_empresa, e.nombre AS nombre_empresa, CONCAT(l.localidad,', ',p.provincia) AS direccion, a.nombre_aleatorio AS imagen FROM tbl_candidato_empresas_seguidas ces LEFT JOIN tbl_empresa e ON ces.id_empresa=e.id LEFT JOIN tbl_provincias p ON e.provincia=p.id LEFT JOIN tbl_localidades l ON e.localidad=l.id LEFT JOIN tbl_archivos a ON e.id_imagen=a.id WHERE ces.id_usuario=$id_usuario");
        	$favoritos = DB::select("SELECT COUNT(*) AS count FROM tbl_favoritos WHERE id_usuario=$id_usuario ");
        	$recomendaciones = DB::select("SELECT COUNT(*) AS count FROM tbl_recomendaciones WHERE id_usuario=$id_usuario ");

        	$vista->postulaciones = $postulaciones[0]->count;
        	$vista->empresas_seguidas = $empresas_seguidas[0]->count;
        	$vista->list_empresas_seguidas = $list_empresas_seguidas;
        	$vista->favoritos = $favoritos[0]->count;
        	$vista->recomendaciones = $recomendaciones[0]->count;
            return $vista;
        } catch (Exception $e) {

        }

    }
}
