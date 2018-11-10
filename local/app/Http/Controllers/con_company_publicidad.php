<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Http\Requests;
use File;
use Illuminate\Support\Facades\Input;
class con_company_publicidad extends Controller
{
	/**Detallede lavista publica**/
    public function index($id)
    {	
    	$sql="SELECT titulo,id FROM tbl_company_ofertas WHERE plantilla <> 'SI' AND estatus =1 ORDER BY id DESC  limit 0,15";
    	$sql_destacadas="SELECT nombre,img_profile as logo,sector,id FROM tbl_publicidad_empresa  ORDER BY id DESC LIMIT 0,25";
    	$sql_detalle="SELECT *,count(id) as cantidad FROM tbl_publicidad_empresa WHERE id =".$id."";

    	$ofertas=DB::select($sql);
    	$detalle=DB::select($sql_detalle);
    	if($detalle[0]->cantidad==0)
    	{
    		return Redirect('ofertas?result=La empresa que busca no existe.');
    	}
    	$vista=View::make("empresa_publicidad_detalle");
    	$vista->identificador=$id;
    	$vista->detalle=$detalle;
    	$vista->destacadas=DB::select($sql_destacadas);
    	$vista->ofertas=$ofertas;
    	return $vista;
    }

    /**Administrador**/
    public function indexEmpresa()
    {
    	$vista=View::make("administrator_empresa_publicidad");
    	$sql="SELECT * FROM tbl_publicidad_empresa ORDER BY nombre ASC";
    	$vista->datos=DB::select($sql);
    	return $vista;
    }

     public function eliminar($id)
    {
    	 
    	$sql="DELETE FROM tbl_publicidad_empresa WHERE id = ".$id."";
    	DB::delete($sql);
    	return Redirect('administracion/publicidad?result=Empresa eliminada con éxito.');
    }

    public function recomendar()
    {
    	$sql="INSERT INTO tbl_empresas_recomendadas (empresa) VALUES ('".$_POST['empresa']."')";
    	 if(isset($_POST['empresa']) && $_POST['empresa']!=""){
    	try {
    		DB::insert($sql);
    		return Redirect('company/detalle/'.$_POST['identificador'].'?result=Gracias por compartir tus recomendaciones');
    	} catch (Exception $e) {
    		
    	}}
    	else
    	{
    		return Redirect('company/detalle/'.$_POST['identificador'].'?result=Debe la empresa que desea recomendar');
    	}
    }

    public function valorar()
    {
    	$sql="INSERT INTO tbl_evaluacion_jobbers (evaluacion,descripcion) VALUES ('".$_POST['valoracion']."','".$_POST['detalle']."')";
    	try {
    		DB::insert($sql);
    		return Redirect('company/detalle/5?result=Gracias por valorarnos');
    	} catch (Exception $e) {
    		
    	}
    }

    public function add_empresa(Request $request)
    {	
 		 




    	if($_POST['nombre']==""){return Redirect('administracion/publicidad?result=Debe agregar el nombre de la empresa');}
    	else if($_POST['sector']==""){return Redirect('administracion/publicidad?result=Debe agregar el sector de la empresa');}
    	else if($_FILES['img_perfil']["name"]=="")
 		{return Redirect('administracion/publicidad?result=Debe agregar la imagen de perfil de la empresa');} 
 		if($_FILES['img_portada_2']["name"]=="")
 		{return Redirect('administracion/publicidad?result=Debe agregar la imagen de portada de la empresa');} 

    	else if($_POST['descripcion']==""){return Redirect('administracion/publicidad?result=Debe agregar la descripción de la empresa');}
    	else if($_POST['video']==""){return Redirect('administracion/publicidad?result=Debe agregar un video de la empresa');}
    	else if($_POST['titulo_oferta']==""){return Redirect('administracion/publicidad?result=Debe agregar el título dela oferta');}
    	else if($_POST['link']==""){return Redirect('administracion/publicidad?result=Debe agregar el link de la oferta');}
    	else if($_POST['descripcion_oferta']==""){return Redirect('administracion/publicidad?result=Debe la descripción de la oferta');}

      else{
 
    	$logo=$this->subir_imagen($request,'perfil','logo');
    	$portada=$this->subir_imagen($request,'portada','portada');
    	if($logo==""){return Redirect('administracion/publicidad?result=Debe agregar una para el logo.');}
    	else if($portada==""){return Redirect('administracion/publicidad?result=Debe agregar una para la portada.');}
    	else
    	{
    		$ofertas="";
    		if(isset($_POST['o1']) && isset($_POST['l1']) && $_POST['o1']!="" && $_POST['l1']!="")
    		{$ofertas=$ofertas."#$#".$_POST['o1']."**$**".$_POST['l1'];}

    		if(isset($_POST['o2']) && isset($_POST['l2']) && $_POST['o2']!="" && $_POST['l2']!="")
    		{$ofertas=$ofertas."#$#".$_POST['o2']."**$**".$_POST['l2'];}

    		if(isset($_POST['o3']) && isset($_POST['l3']) && $_POST['o3']!="" && $_POST['l3']!="")
    		{$ofertas=$ofertas."#$#".$_POST['o3']."**$**".$_POST['l3'];}

    		if(isset($_POST['o4']) && isset($_POST['l4']) && $_POST['o4']!="" && $_POST['l4']!="")
    		{$ofertas=$ofertas."#$#".$_POST['o4']."**$**".$_POST['l4'];}

    		$sql="INSERT INTO tbl_publicidad_empresa
    		(nombre,sector,img_profile,img_portada,descripcion,video,titulo_oferta,descripcion_oferta,ofertas,link_oferta)
    		VALUES('".$_POST['nombre']."','".$_POST['sector']."','".$logo."','".$portada."','".$_POST['descripcion']."',
    		'".$_POST['video']."','".$_POST['titulo_oferta']."','".$_POST['descripcion_oferta']."','".$ofertas."','".$_POST['link']."')
    		";

    		try {
    			DB::insert($sql);
    			return Redirect('administracion/publicidad?result=Empresa agredada con éxito.');
    		} catch (Exception $e) {
    			
    		}
    	}
    	}

    }

    public function subir_imagen($request,$tipo,$ruta)
    { 
    	 
     	$imagen="";
     	if($tipo=="perfil"){$imagen="img_perfil";}
     	else{$imagen="img_portada_2";}
  	 	$request->hasFile($imagen);
        $image = $request->file($imagen);
        $name = '0001-text'.time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = 'img_company_pub/'.$ruta;
        if($image->move($destinationPath, $name))
        {
        	return $name;
        } 
        else
        {
        	return false;
        }
    	 
    }
}
