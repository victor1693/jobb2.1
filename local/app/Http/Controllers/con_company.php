<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
use Redirect;
class con_company extends Controller
{
	public function index_register()
	{
		$vista=View::make("empresas.register");
		try {
			$sql="SELECT * FROM tbl_provincias";
			$provincias=DB::select($sql);
			$vista->provincias=$provincias;
			return $vista;
		} catch (Exception $e) {
			
		}
		

	}

    public function registrar(Request $request)
    { 	
    	date_default_timezone_set('America/Argentina/Cordoba');
    	$fecha=date('Y-m-d'); 
    	if($_POST['representante']=='' || 
    	 strtolower($_POST['correo'])=='' || 
    	 strtolower($_POST['clave'])=='' || 
    	 $_POST['provincia']=='' || 
    	 $_POST['localidad']=='' || 
    	 $_POST['direccion']=='' || 
    	 $_POST['empresa']=='' || 
    	 $_POST['direccion']=='' )
    	{
    		abort(500);
    	}
    	else
    	{
    		$sql="SELECT count(id) as cantidad FROM tbl_company WHERE correo='".strtolower($_POST['correo'])."'";
    		$datos=DB::select($sql);
    		if($datos[0]->cantidad==1)
    		{
    			echo "correo_existe";
    			die();
    		}

    	}
        $sql="INSERT INTO tbl_company (representante,correo,clave,provincia,localidad,direccion,nombre,fecha_registro,plan) 
    	VALUES(
    	'".$_POST['representante']."',
    	'".strtolower($_POST['correo']). "',
    	'".md5(strtolower($_POST['clave']))."',
    	'".$_POST['provincia']."',
    	'".$_POST['localidad']."',
    	'".$_POST['direccion']."',
    	'".$_POST['empresa']."',
    	'".$fecha."',
        'Gratis'
    	)";
    	try {
    		DB::insert($sql);
            $sql_emp='SELECT * FROM tbl_company 
            WHERE correo="'.strtolower($_POST['correo']).'" 
            AND clave="'.md5(strtolower($_POST['clave'])).'"';
            $datos=DB::select($sql_emp);
            $request->session()->set('company_id',$datos[0]->id);
            $request->session()->set('company_img',$datos[0]->img_profile);
            $request->session()->set('company_nombre',$datos[0]->nombre); 
            $request->session()->set('tipo_usuario','1');
             
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('registrar',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	} 
    }
 
    public function get_provincias()
    {
    	
    	try {
    		$sql="SELECT * FROM tbl_provincias";
    		$provincias=DB::select($sql);
    		return $provincias;
    	} catch (Exception $e) {
    		
    	}
    }
    public function get_localidades()
    {
    	$id=$_POST['provincia'];

    	if($id!=0 || $id!="")
    	{ 
    		try {
    			$sql="SELECT t1.id_provincia,t2.provincia,t1.localidad FROM tbl_localidades t1
				INNER JOIN tbl_provincias t2 ON t2.id = t1.id_provincia
				WHERE t2.provincia  = '".$id."'";
    			$localidades=DB::select($sql); 
    			echo json_encode($localidades); 
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('get_localidades',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		} 
    	}
    	else
    	{
    		try {
    			$sql="SELECT * FROM tbl_localidades";
    			$localidades=DB::select($sql); 
    			return $localidades;
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('get_localidades',str_replace("'", "",$ex->getMessage()),'');
    			dd("Ha ocurrido un error al procesar la solicitud. Ya fue reportado al equipo de soporte"); 
    		} 
    	}
    } 

    public function detalle($id)
    {
        $vista=View::make('empresa_detalle');
        $sql="
        SELECT t1.*,t2.titulo,concat(t2.provincia,' - ',t2.localidad) as direccion,t2.sector FROM tbl_company t1
        LEFT JOIN tbl_company_ofertas t2 ON t2.id_empresa = t1.id
        WHERE t1.id = ".$id."
        ";
        $datos= DB::select($sql);
        $sql_new="
        SELECT * FROM tbl_company 
        WHERE actividad_empresa = '".$datos[0]->actividad_empresa."'
        AND id != ".$datos[0]->id."
        AND img_profile !='' 
        AND nombre !=''
        AND estatus = 1
        ORDER BY id desc";

        $sql_ofertas="SELECT * ,DATEDIFF(CURDATE(),fecha_creacion) as dias FROM tbl_company_ofertas 
        WHERE id_empresa =".$id." AND estatus = 1 AND plantilla <> 'SI'
        ORDER BY id desc
        ";
        $vista->datos =$datos;
        $vista->new = DB::select($sql_new);
        $vista->ofertas = DB::select($sql_ofertas);
        return $vista;
    }

    public function ver()
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
        
        if(isset($_GET['categoria']))
        {
           $filtros =$filtros. " AND t1.actividad_empresa ='".$_GET['categoria']."'";
        }
         if(isset($_GET['tamano']))
        {
           $filtros =$filtros. " AND t1.tamano_empresa ='".$_GET['tamano']."'";
        }
         
        if(isset($_GET['buscar']))
        {
            $filtros =$filtros. " AND  (t1.descripcion LIKE '%".$_GET['buscar']."%' OR  t1.nombre LIKE '%".$_GET['buscar']."%')";
        }

        $vista = View::make('empresas_ver');
        $sql="
         SELECT  t1.*,count(id_empresa) as cantidad FROM tbl_company t1 
         LEFT JOIN tbl_company_ofertas t2 ON t2.id_empresa =t1.id  AND t2.estatus = 1  AND t2.plantilla <> 'SI'
         WHERE 1=1  ".$filtros."
         GROUP BY t1.id
         ORDER BY count(id_empresa) DESC
         ";
        $sql_publicidad="SELECT * FROM tbl_publicidad_empresa ORDER BY vistos ASC LIMIT 0,2";
        $publicidad=DB::select($sql_publicidad);
        $vista->publicidad=$publicidad;
        $datos=DB::select($sql);
        $vista->datos= $datos;

        return $vista;
    }
}
