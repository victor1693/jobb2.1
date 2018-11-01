<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class con_candidato_seguir extends Controller
{
	public function index()
    {
    	$vista=View::make("candidatos_empresas_seguidas");

    	$sql="SELECT t1.id as id_empresa,count(t1.id_empresa) as cantidad,t2.id_empresa,t3.nombre  as empresa ,t3.direccion from tbl_publicacion t1 
			INNER JOIN tbl_candidato_empresas_seguidas t2 ON t1.id_empresa =t2.id_empresa
			INNER JOIN tbl_empresa t3 ON t3.id = t2.id_empresa 
			WHERE t2.id_usuario=".session()->get('cand_id')."
			GROUP by t1.id_empresa ";
    	try {
    		$datos=DB::select($sql);
    		$vista->datos=$datos;
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    	
    }
	public function eliminar($id)
    {
    	 
    	$sql="DELETE FROM  tbl_candidato_empresas_seguidas
			WHERE id_usuario=".session()->get('cand_id')." AND id_empresa =".$id."";
    	try {
    		DB::delete($sql); 
    		return Redirect('candiempseg');
    	} catch (Exception $e) {
    		
    	}
    	
    }
    public function seguir($id)
    {
    	//Saber si ya le dio a seguir a esta empresa
    	$sql_consultar="SELECT count(*) as cantidad 
    	FROM tbl_candidato_empresas_seguidas 
    	WHERE id_empresa=".$id."
    	AND id_usuario=".session()->get('cand_id')."";

    	$sql="INSERT INTO tbl_candidato_empresas_seguidas VALUES (null,
    	".session()->get('cand_id').",
    	".$id.",
    	null
    	);";
    	try {
    		$datos=DB::select($sql_consultar);
    		if($datos[0]->cantidad!=1)
    		{
    			DB::insert($sql);
    			return Redirect('candiempseg');
    		}
    		else
    		{
    			return Redirect('candiempseg?result=ya se encuentra siguiendo esta empresa.');
    		} 
    		
    	} catch (Exception $e) {
    		
    	}
    }
}
