<?php

namespace App\Http\Controllers;

use DB;
use View;
use Illuminate\Http\Request;

class con_candidato_postulaciones extends Controller
{
    public function index()
    {
        $vista = View::make("candidatos_postulaciones");
        $sql   = "
            SELECT t1.id_oferta as id,count(t1.id_oferta) as cantidad,t2.titulo,t3.nombre FROM tbl_company_postulados t1
            INNER JOIN tbl_company_ofertas t2 ON t2.id = t1.id_oferta
            INNER JOIN tbl_company t3 ON t3.id = t2.id_empresa 
            WHERE t1.id_oferta IN (SELECT id_oferta FROM tbl_company_postulados WHERE id_usuario=".session()->get('cand_id').")
            GROUP BY t1.id_oferta
           "; 
        try {
            $datos             = DB::select($sql); 
            $vista->datos      = $datos;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function postular()
    {
        if(session()->get('cand_id')!="")
        {
            $sql_validar="
            SELECT count(*) AS cantidad FROM tbl_company_postulados
            WHERE id_usuario =".session()->get('cand_id')."
            AND id_oferta = ".$_POST['id']."";
            $datos_postulacion=DB::select($sql_validar);
            if($datos_postulacion[0]->cantidad>0)
                {
                    echo '1';
                } 
                else
                {
                    $sql="INSERT INTO tbl_company_postulados (id_usuario,id_oferta)
                    VALUES (".session()->get('cand_id').",".$_POST['id'].")";
                    DB::insert($sql);
                    echo '1';
                } 
        }
        else
        {
            echo 'session';
        } 
       
    }
}
