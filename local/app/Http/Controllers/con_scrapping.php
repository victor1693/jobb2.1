<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_scrapping extends Controller
{
    public function index()
    {
    	$filtro=" WHERE 1 = 1 ";
    	if(isset($_GET['buscar']) && $_GET['buscar']!="")
    	{
    		$filtro=$filtro.'AND titulo like "%'.$_GET["buscar"].'%"';
    	}
    	if(isset($_GET['provincia']) && $_GET['provincia']!="")
    	{
    		$filtro=$filtro.'AND provincia = "'.$_GET['provincia'].'"';
    	}
    	if(isset($_GET['localidad']) && $_GET['localidad']!="")
    	{
    		$filtro=$filtro.'AND localidad  = "'.$_GET['localidad'].'"';
    	}
    	if(isset($_GET['empresa']) && $_GET['empresa']!="")
    	{
    		$filtro=$filtro.'AND empresa = "'.$_GET['empresa'].'"';
    	}
    	$vista=View::make("scrapping");
    	$sql="SELECT  * FROM tbl_scrapping ".$filtro." GROUP BY amigable ORDER BY id DESC";

    	$ofertas_jobbers="SELECT  t1.*,t2.img_profile,t2.nombre as empresa FROM tbl_company_ofertas t1
    	INNER JOIN tbl_company t2 ON t2.id = t1.id_empresa
    	WHERE t1.plantilla <> 'SI' AND t1.estatus=1 
    	ORDER BY t1.id DESC
    	LIMIT 0,4";

    	$provincias="SELECT provincia FROM tbl_scrapping  GROUP BY provincia ORDER BY provincia ASC";
    	$filtro_provincia="";
        if(isset($_GET['provincia']) && $_GET['provincia'] !="")
        {
            $filtro_provincia=$filtro_provincia."  AND provincia = '".$_GET['provincia']."'";
        }
        $localidad="SELECT localidad FROM tbl_scrapping  
        WHERE 1 = 1 ".$filtro_provincia."
        GROUP BY localidad ORDER BY localidad ASC";
     
        $empresa="SELECT empresa FROM tbl_scrapping  GROUP BY empresa ORDER BY empresa ASC";
    	$sql_publicidad="SELECT * FROM tbl_publicidad_empresa ORDER BY vistos ASC LIMIT 0,3";
        $publicidad=DB::select($sql_publicidad); 
        foreach ($publicidad as $key) {

            DB::update('UPDATE tbl_publicidad_empresa SET vistos ='.($key->vistos + 1).' WHERE id = '.$key->id.'');
        }

    	$datos=DB::select($sql);
    	$vista->datos=$datos;
    	$vista->ofertas=DB::select($ofertas_jobbers);
    	$vista->publicidad=$publicidad;
    	$vista->provincia=DB::select($provincias);
    	$vista->localidad=DB::select($localidad);
    	$vista->empresas=DB::select($empresa); 
    	return $vista;
    }

      public function detalle($url)
    {
    	$vista=View::make("detalle-scrapping");
    	$sql="SELECT  * FROM tbl_scrapping WHERE amigable='".$url."'";
        
    	$datos=DB::select($sql);
    	$sql_mas_ofertas="SELECT * FROM tbl_scrapping WHERE empresa = '".$datos[0]->empresa."' AND amigable <> '".$url."'";
     
        $vista->ofertas = DB::select($sql_mas_ofertas);
    	$vista->datos=$datos;
    	return $vista;
    }
}
