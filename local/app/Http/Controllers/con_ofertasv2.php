<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
class con_ofertasv2 extends Controller
{
    public function ws()
    { 
        $sql="INSERT INTO tbl_whatsapp (numero) VALUES('".$_POST['numero']."')";
        DB::insert($sql);
        return redirect('ofertas');
    }
    public function index()
    {
    	$filtros=""; 

    	 
    	if(isset($_GET['provincia']))
    	{
    		$filtros =$filtros. " AND t1.provincia ='".$_GET['provincia']."'";
    	}
    	if(isset($_GET['localidad']))
    	{
    		$filtros =$filtros. " AND t1.localidad ='".$_GET['localidad']."'";
    	}
 		
    	if(isset($_GET['habilidades']))
    	{
    		$filtros =$filtros. " AND t1.habilidades LIKE '%".$_GET['habilidades']."%'";
    	}
 		if(isset($_GET['idiomas']))
    	{
    		$filtros =$filtros. " AND t1.idiomas LIKE '%".$_GET['idiomas']."%'";
    	}
    	if(isset($_GET['disponibilidad']))
    	{
    		$filtros =$filtros. " AND t1.disponibilidad ='".$_GET['disponibilidad']."'";
    	}

    	if(isset($_GET['genero']))
    	{
    		$filtros =$filtros. " AND t1.genero ='".$_GET['genero']."'";
    	}

    	if(isset($_GET['sector']))
    	{
    		$filtros =$filtros. " AND t1.sector ='".$_GET['sector']."'";
    	}

    	if(isset($_GET['nivel_estudio']))
    	{
    		$filtros =$filtros. " AND t1.nivel_estudio ='".$_GET['nivel_estudio']."'";
    	}

    	if(isset($_GET['plan_estado']))
    	{
    		$filtros =$filtros. " AND t1.plan_estado ='".$_GET['plan_estado']."'";
    	}

    	if(isset($_GET['turno']))
    	{
    		$filtros =$filtros. " AND t1.turno ='".$_GET['turno']."'";
    	}
    	if(isset($_GET['discapacidad']))
    	{
    		$filtros =$filtros. " AND t1.discapacidad ='".$_GET['discapacidad']."'";
    	}

    	if(isset($_GET['buscar']))
    	{
    		$filtros =$filtros. " AND  (t1.descripcion LIKE '%".$_GET['buscar']."%' OR  t1.titulo LIKE '%".$_GET['buscar']."%')";
    	}

    	$vista = View::make('ofertasv2');
    	$sql="SELECT  t1.*,t1.amigable as id, t2.img_profile, DATE_FORMAT(t1.tmp, '%d-%m-%Y %H:%i:%s') as tmp FROM tbl_company_ofertas t1
		LEFT JOIN tbl_company t2 ON t2.id = t1.id_empresa
		 WHERE t1.estatus = 1 ".$filtros."
		 GROUP BY t1.id
         ORDER BY t1.tmp DESC
		 ";
        $sql_publicidad="SELECT * FROM tbl_publicidad_empresa ORDER BY vistos ASC LIMIT 0,2";
        $publicidad=DB::select($sql_publicidad);
        
        
        foreach ($publicidad as $key) {

            DB::update('UPDATE tbl_publicidad_empresa SET vistos ='.($key->vistos + 1).' WHERE id = '.$key->id.'');
        } 
    	$datos=DB::select($sql);
    	$vista->datos= $datos;
        $vista->publicidad=$publicidad; 
    	return $vista;
    }

    public function detalle_oferta($id)
    {
    	$vista=View::make("detalle_oferta_v2");
    	$sql="
    	SELECT  
    	t1.*,
    	t2.img_profile,
    	t2.actividad_empresa,
    	t2.descripcion as emp_descripcion,
    	t2.nombre as nombre_empresa,
    	concat(t2.pais,' - ',t2.provincia,' - ',t2.localidad) as emp_direccion,
    	count(t1.id) as ofertas 
    	FROM  tbl_company_ofertas t1 
		LEFT JOIN tbl_company t2 ON t2.id = t1.id_empresa
		WHERE t1.amigable='".$id."'
		GROUP BY t1.id_empresa
		";

       
		$sql_ofertas_recientes="
    	SELECT
    	DATEDIFF(CURDATE(),t1.fecha_creacion) as dias,  
    	t1.*,
        t1.amigable as id,
    	t2.img_profile,
    	t2.actividad_empresa,
    	t2.descripcion as emp_descripcion,
    	t2.nombre as nombre_empresa,
    	concat(t2.pais,' - ',t2.provincia,' - ',t2.localidad) as emp_direccion 
    	FROM  tbl_company_ofertas t1 
		LEFT JOIN tbl_company t2 ON t2.id = t1.id_empresa 
        WHERE t1.estatus = 1 AND t1.plantilla <> 'SI'
	    ORDER BY t1.tmp DESC 
	    LIMIT 0,5
		";


		$datos= DB::select($sql);
		$sql_ofertas="
		SELECT *,amigable as id FROM tbl_company_ofertas 
		WHERE estatus = 1 AND id_empresa =".$datos[0]->id_empresa." AND amigable <> '".$id."'";
         
		 
		$habilidades="";
		if($datos[0]->habilidades!="")
		{
			$temp=explode(",",$datos[0]->habilidades);
			foreach ($temp as $key => $value) {
				$habilidades=$habilidades.' OR t1.habilidades like "%'.$value.'%"';
			} 
		}
		$sql_ofertas_similares='
		SELECT 
		t1.*, 
        t1.amigable as id,
		DATEDIFF(CURDATE(),t1.fecha_creacion) as dias, 
		t2.img_profile,
    	t2.actividad_empresa,
    	t2.descripcion as emp_descripcion,
    	t2.nombre as nombre_empresa,
    	concat(t2.pais," - ",t2.provincia," - ",t2.localidad) as emp_direccion
		FROM tbl_company_ofertas t1
		LEFT JOIN tbl_company t2 ON t2.id = t1.id_empresa 
		WHERE t1.estatus = 1 AND  t1.id != '.$datos[0]->id.' AND t1.plantilla != "SI" AND t1.sector ="'.$datos[0]->sector.'" '.$habilidades.'  
		GROUP BY t1.id
		ORDER BY t1.tmp DESC
		LIMIT 0,10
		';
		$candidato=0;
		if(session()->get('cand_id')!="")
		{
			$candidato=session()->get('cand_id');	
		}
    	$sql_postulado="
    	SELECT count(*) as cantidad 
    	FROM tbl_company_postulados 
    	WHERE id_oferta =".$datos[0]->id." 
    	AND id_usuario=".$candidato."";

    	$sql_up_vista="
    	UPDATE tbl_company_ofertas 
    	SET vistas = ".($datos[0]->vistas + 1)."
    	WHERE id =".$datos[0]->id."";
    	DB::update($sql_up_vista);
    	$vista->datos=$datos;
    	$vista->postulado=DB::select($sql_postulado);
        
    	$vista->ofertas=DB::select($sql_ofertas);
    	$vista->ofertas_recientes=DB::select($sql_ofertas_recientes); 
    	$vista->ofertas_similares=DB::select($sql_ofertas_similares);
        $vista->id_oferta=$datos[0]->id;
    	return $vista;
    }
}
