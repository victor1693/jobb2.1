<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
use File;
use Illuminate\Support\Facades\Input;
class con_company_profile extends Controller
{
    public function index()
    {
    	$vista=View::make("empresas.perfil");
    	$sql="SELECT * FROM tbl_company WHERE id =".session()->get('company_id')."";
    	$sql_provincias="SELECT * FROM tbl_provincias";
    	$sql_actividad_empresa="SELECT * FROM tbl_actividades_empresa order by nombre ASC";
    	$vista->actividad_empresa=DB::select($sql_actividad_empresa);
    	$vista->empresa=DB::select($sql);
    	$vista->provincias=DB::select($sql_provincias);
    	return $vista;
    }

    public function info_general()
    {
    	if(
    		$_POST['nombre_empresa']!="" &&
    		$_POST['razon_social']!="" &&    	
	    	$_POST['representante']!="" &&    	
	    	$_POST['actividad_empresa']!="" &&
	    	$_POST['tipo_empresa']!="" &&
	    	$_POST['tamano_empresa']!="" &&
	    	$_POST['descripcion']!="" &&
	    	$_POST['soy']!=""
    		)
    	{
    		try {
    			 $sql="UPDATE tbl_company SET 
		    	 nombre='".$this->injection($_POST['nombre_empresa'])."',
		    	 razon_social='".$this->injection($_POST['razon_social'])."',
		    	 representante='".$this->injection($_POST['representante'])."',
		    	 actividad_empresa='".$this->injection($_POST['actividad_empresa'])."',
		    	 tipo_empresa='".$this->injection($_POST['tipo_empresa'])."',
		    	 tamano_empresa='".$this->injection($_POST['tamano_empresa'])."',
		    	 descripcion='".$this->injection($_POST['descripcion'])."',
		    	 cuit='".$this->injection($_POST['cuit'])."',
		    	 soy='".$this->injection($_POST['soy'])."'
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 echo "1";
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_general',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		}
    	}
    	else
    	{
    		echo "0";
    	}  
    }

     public function info_contacto()
    {
    	if(
    		$_POST['pais']!="" &&
    		$_POST['provincia']!="" &&    	
	    	$_POST['localidad']!="" &&    	
	    	$_POST['direccion']!="" &&
	    	$_POST['telefono_celular']!="" && 
	    	$_POST['correo']!=""
    		)
    	{
    		try {
    			 $sql="UPDATE tbl_company SET 
		    	 pais='".$this->injection($_POST['pais'])."',
		    	 provincia='".$this->injection($_POST['provincia'])."',
		    	 localidad='".$this->injection($_POST['localidad'])."',
		    	 direccion='".$this->injection($_POST['direccion'])."',
		    	 telefono_celular='".$this->injection($_POST['telefono_celular'])."',
		    	 telefono_fijo='".$this->injection($_POST['telefono_fijo'])."',
		    	 correo_contacto='".$this->injection($_POST['correo'])."',
		    	 latitud='".$this->injection($_POST['latitud'])."',
		    	 longitud='".$this->injection($_POST['longitud'])."',
		    	 pagina_web='".$this->injection($_POST['pagina'])."'
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 echo "1";
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_contacto',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		}
    	}
    	else
    	{
    		echo "0";
    	} 
    }

     public function info_redes()
    { 
    		try {
    			 $sql="UPDATE tbl_company SET 
		    	 facebook='".$this->injection($_POST['facebook'])."',
		    	 twitter='".$this->injection($_POST['twitter'])."',
		    	 linkedin='".$this->injection($_POST['linkedin'])."'
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 echo "1";
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_redes',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		} 
    }

     public function info_youtube()
    { 
    		try {
    			 $sql="UPDATE tbl_company SET 
		    	 video_youtube='".$this->injection($_POST['youtube'])."' 
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 echo "1";
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_redes',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		} 
    }
 	public function info_imagen(Request $request)
    { 
    	 
     
  	 	$request->hasFile('imagen');
        $image = $request->file('imagen');
        $name = '0001-text'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = 'uploads/min';
        $image->move($destinationPath, $name); 
    		 try {
    			 $sql="UPDATE tbl_company SET 
		    	 img_profile='".$name."' 
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 if(file_exists($destinationPath.'/'.session()->get('company_img')))
		    	 {
		    	 	unlink($destinationPath.'/'.session()->get('company_img'));		    	 		
		    	 }
		    	 session()->set('company_img',$name);  
		    	 echo $name;
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_redes',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		}
    }

}
