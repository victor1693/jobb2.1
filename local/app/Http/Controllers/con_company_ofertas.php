<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Http\Requests;

class con_company_ofertas extends Controller
{
    public function index()
    {
        
    	$vista=View::make("empresas.ofertas");
    	$sql_provincias="SELECT * FROM tbl_provincias";
    	$sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
    	$sql_area="SELECT * FROM tbl_areas_sectores ORDER BY nombre ASC";
    	$sql_nivel_estudio="SELECT * FROM tbl_nivel_estudio";
    	$sql_idiomas="SELECT * FROM tbl_idiomas ORDER BY descripcion ASC";
    	$sql_habilidades="SELECT * FROM tbl_habilidades ORDER BY descripcion ASC";
    	$sql_plan_estado="SELECT * FROM tbl_planes_estado WHERE plan <> '' AND plan <> 'No aplica'";
    	$sql_genero="SELECT * FROM tbl_generos";
    	$sql_turno="SELECT * FROM tbl_turnos";
        $sql_salarios="SELECT * FROM tbl_rango_salarios";
    	$sql_plantillas ="SELECT * FROM tbl_company_ofertas WHERE plantilla ='SI' AND  id_empresa=".session()->get('company_id')."";

        $vista->plantillas=DB::select($sql_plantillas);
        $vista->salarios=DB::select($sql_salarios);
        $vista->provincias=DB::select($sql_provincias);
    	$vista->disponibilidad=DB::select($sql_disponibilidad);
    	$vista->area=DB::select($sql_area);
    	$vista->nivel_estudio=DB::select($sql_nivel_estudio);
    	$vista->idiomas=DB::select($sql_idiomas);
    	$vista->plan_estado=DB::select($sql_plan_estado);
    	$vista->genero=DB::select($sql_genero); 
    	$vista->habilidades=DB::select($sql_habilidades);
    	$vista->habilidades_json= json_encode(DB::select('SELECT descripcion as text, descripcion FROM tbl_habilidades ORDER BY descripcion ASC'));
    	$vista->idiomas_json= json_encode(DB::select('SELECT descripcion as text, descripcion FROM tbl_idiomas ORDER BY descripcion ASC'));  
    	$vista->turnos=DB::select($sql_turno);  
    	return $vista;
    }

    public function get_ofertas()
    {
        $sql_plantillas ="SELECT * FROM tbl_company_ofertas WHERE plantilla ='SI' AND  id_empresa=".session()->get('company_id')."";
        $plantillas=DB::select($sql_plantillas);
    	$sql="
        SELECT t1.*,COUNT(t2.id) as cantidad,lower(t1.titulo) as mi_titulo FROM tbl_company_ofertas t1
        LEFT JOIN tbl_company_postulados t2 ON t2.id_oferta  = t1.id 
        LEFT JOIN tbl_candidato_datos_personales t3 ON t3.id_usuario = t2.id_usuario
        LEFT JOIN tbl_archivos t4 ON t4.id_usuario = t2.id_usuario      
        WHERE  t1.id_empresa= ".session()->get('company_id')." 
        GROUP BY t1.id
        ORDER BY COUNT(t2.id) DESC
        ";
      
    	try {
    		$datos=DB::select($sql); 
            $obj = (object) array('ofertas' => $datos,'plantillas' => $plantillas,'plan' => session()->get('company_plan'));
    		echo json_encode($obj);
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas - get_ofertas',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	}
    }

    public function get_oferta()
    {
    	if($_POST['id']!=""){
    	$sql="SELECT * FROM tbl_company_ofertas WHERE id_empresa = ".session()->get('company_id')." AND id =".$_POST['id']."
        ";

    	try {
    		$datos=DB::select($sql);
    		$sql="SELECT t1.localidad,t2.provincia FROM tbl_localidades t1
			INNER JOIN tbl_provincias t2 ON t2.id = t1.id_provincia
			WHERE provincia = '".$datos[0]->provincia."'";
    		$localidades=DB::select($sql);
    		$obj = (object) array('valores' => $datos,'localidades' => $localidades); 
    		echo json_encode($obj);
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas - get_oferta',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	}} 
    }

    public function update_estatus()
    {
    	if($_POST['estatus'] !="" && $_POST['id'] !="")
    	{ 
    		$valor=0;
	    	if($_POST['estatus']==1)
	    	{
	    		$valor=1;
	    	}
	    	else if($_POST['estatus']==0)
	    	{
	    		 $valor=0;
	    	}
	    	try {
	    			DB::update('UPDATE tbl_company_ofertas SET estatus = '.$valor.' WHERE id_empresa = '.session()->get("company_id").' AND id ='.$_POST['id'].'');
	    			echo 'Oferta actualizada con éxito.';
	    		} catch (\Illuminate\Database\QueryException $ex) {
		    		 $this->auditar('con_company_ofertas -  update_estatus',str_replace("'", "",$ex->getMessage()),'');
		    		 abort(500);
	    		}
    	} 
    }

    public function eliminar()
    {
    	if($_POST['id'] !="")
    	{     		 
	    	try {
	    			DB::delete('DELETE FROM tbl_company_ofertas WHERE id_empresa = '.session()->get("company_id").' AND id ='.$_POST['id'].'');
	    			echo 'Oferta eliminada con éxito.';
	    		} catch (\Illuminate\Database\QueryException $ex) {
		    		 $this->auditar('con_company_ofertas -  update_estatus',str_replace("'", "",$ex->getMessage()),'');
		    		 abort(500);
	    		}
    	} 
    }
    public function publicar()
    {
 	//	 
        date_default_timezone_set('America/Argentina/Cordoba');
        $hoy = date('Y-m-d H:m:s');
        $las_habilidades="";
 	     if($_POST['habilidades']=="")
 	     {
 	     	$las_habilidades="";
 	     }else
         {
            $las_habilidades=$this->arreglos($_POST['habilidades']);
         }
 	      if($_POST['idiomas']=="")
 	     {
 	     	$_POST['idiomas']=array('0'=>'Español'); 
 	     }

         $plantilla="NO";
         $plantilla_titulo="";
         if($_POST["theme"]=="1")
         {
            $plantilla="SI";
            $_POST['tipo_oferta']='1';
         }
        
    	 $campos_editar='    	 
    	 alias ="'.$_POST['alias'].'",
         experiencia ="'.$_POST['experiencia'].'",
         salario ="'.$_POST['salarios'].'",
    	 titulo ="'.$_POST['titulo'].'",
    	
    	 pais ="'.$_POST['pais'].'",
    	 provincia ="'.$_POST['provincia'].'",
    	 localidad ="'.$_POST['localidad'].'",
    	 direccion ="'.$_POST['direccion'].'",
    	 disponibilidad ="'.$_POST['disponibilidad'].'",
    	 sector ="'.$_POST['sector'].'",
    	 nivel_estudio ="'.$_POST['nivel_estudio'].'",
    	 n_vacantes ='.$_POST['vacantes'].',
    	 plan_estado ="'.$_POST['plan_estado'].'",
    	 confidencial ='.$_POST['confidencial'].',
    	 discapacidad ='.$_POST['discapacidad'].',
    	 turno ="'.$_POST['turno'].'",
    	 genero ="'.$_POST['genero'].'",
    	 edad ="'.$_POST['edad'].'",
    	 habilidades ="'.$las_habilidades.'", 
    	 idiomas ="'.$this->arreglos($_POST['idiomas']).'",
         amigable = "'.$this->url_amigable($_POST["titulo"]) .'",
         tmp="'.$hoy.'"
         ';
    	 $campos='
    	 ( 
         experiencia,
         salario,
    	 id_empresa,
    	 alias,
    	 titulo,
    	 descripcion,
    	 pais,
    	 provincia,
    	 localidad,
    	 direccion,
    	 disponibilidad, 
    	 sector,
    	 nivel_estudio,
    	 n_vacantes,
    	 plan_estado,
    	 confidencial,
    	 discapacidad, 
    	 turno,
    	 genero,
    	 edad,
    	 habilidades,
    	 idiomas,
    	 estatus,
    	 destacar,
    	 plantilla,
    	 plantilla_titulo,
    	 plantilla_descripcion, 
    	 fecha_creacion,
         amigable
    	 )';

    	  $valores="
    	 ( 
          '".$_POST['experiencia']."',
         '".$_POST['salarios']."',
          ".session()->get('company_id').",
    	 '".$_POST['alias']."',
    	 '".$_POST['titulo']."',
    	 '".$_POST['descripcion']."',
    	 '".$_POST['pais']."',
    	 '".$_POST['provincia']."',
    	 '".$_POST['localidad']."',
    	 '".$_POST['direccion']."',
    	 '".$_POST['disponibilidad']."', 
    	 '".$_POST['sector']."',
    	 '".$_POST['nivel_estudio']."',
    	 ".$_POST['vacantes'].",
    	 '".$_POST['plan_estado']."',
    	 '".$_POST['confidencial']."',
    	 '".$_POST['discapacidad']."', 
    	 '".$_POST['turno']."',
    	 '".$_POST['genero']."',
    	 '".$_POST['edad']."',
    	 '".$las_habilidades."',
    	 '".$this->arreglos($_POST['idiomas'])."',
    	 1,
    	 0,
    	 '".$plantilla."',
    	 '".$_POST['theme_title']."',
    	 '',
    	 '".Date('Y-m-d')."',
         '".$this->url_amigable($_POST["titulo"]) ."' 
    	 )";

    	 $sql_editar="";
    	 try {
                 if(session()->get('company_plan')=='Gratis')
                    {
                         $sql_ofertas_total="
                         SELECT count(id) AS cantidad
                         FROM tbl_company_ofertas 
                         WHERE id_empresa = ".session()->get('company_id')." AND plantilla !='SI'";
                         $mis_ofertas=DB::select($sql_ofertas_total);
                         if($mis_ofertas[0]->cantidad>=3)
                         {
                            echo 'Ha alcanzado el límite de publicaciones';
                            die();
                            exit();
                         }
                     }

	    	 	if($_POST['tipo_oferta']=='1' || $_POST['tipo_oferta']=='')
	    	 	{ 
	    	 		 $sql="INSERT INTO tbl_company_ofertas ".$campos." VALUES ".$valores.""; 
                     DB::insert($sql);
                     if($plantilla=="SI")
                     {
                         echo 'Plantilla guardada con éxito.'; 
                     }else
                     {
                         echo 'Oferta publicada con éxito.'; 
                     }
    	 			
	    	 	}
	    	 	else if($_POST['tipo_oferta']=='2')
	    	 	{   if(session()->get('company_plan')=='Premium'){
	    	 		 $sql="UPDATE tbl_company_ofertas SET ".$campos_editar." WHERE id_empresa =".session()->get('company_id')." AND id =".$_POST['publicacion']."";
                    
                   
	    	 		 DB::update($sql);
    	 			   $sql="UPDATE tbl_company_ofertas SET descripcion = '".$_POST['descripcion']."' WHERE id_empresa =".session()->get('company_id')." AND id =".$_POST['publicacion']."";
    	 			   DB::update($sql);
    	 			 echo 'Oferta actualizada con éxito.';
                     } 
	    	 	} 
    	 	 
    	 } catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas -  publicar',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500);
    	 }
    	
    }

    public function crear_amigable()
    {
        $sql="SELECT * FROM tbl_company_ofertas";
        $datos=DB::select($sql);
        foreach ($datos as $key) {
            $sql="UPDATE tbl_company_ofertas SET amigable ='".$this->url_amigable($key->titulo)."' WHERE id  = ".$key->id."";
            DB::update($sql);
        }
    }


    public function arreglos($arreglo)
    {
    	if(count($arreglo)==0){return '';}
    	$result="";
    	$bandera=0;
    	if(count($arreglo)>1)
    	{
    		foreach ($arreglo as $key) {
    			if($bandera==0)
	    		{
	    			$result=$key;
	    			$bandera++;
	    		}
	    		else
	    		{
	    			$result=$result.','.$key;
	    		}
    		} 
    		return $result;
    	}
    	else {return $arreglo[0];} 
    }


    public function url_amigable($text)
    {   
        $text = $this->url_limpiarurl($text);

        $fecha=date('dmy').round(microtime(true) * 1000);
        $new=strtolower($this->url_limpiarurl($text)).'-'.$fecha; 
        $limpio=str_replace('--','-',$new);
        $contador=1;
        while ($contador <= 10) {
            $limpio=str_replace('--','-',$limpio);
            $contador++;
        }
        return $limpio;
    }
     public function url_limpiarurl($valor)
    {
        
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("¿","",$valor); 
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor); 
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("¡","",$valor); 
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("á","a",$valor);
        $valor = str_ireplace("é","e",$valor);
        $valor = str_ireplace("í","i",$valor);
        $valor = str_ireplace("ó","o",$valor);
        $valor = str_ireplace("ú","u",$valor);
        $valor = str_ireplace("Á","A",$valor);
        $valor = str_ireplace("É","E",$valor);
         $valor = str_ireplace(",","",$valor);
        $valor = str_ireplace("Í","I",$valor);
        $valor = str_ireplace("ñ","n",$valor);
        $valor = str_ireplace("Ó","O",$valor);
        $valor = str_ireplace("Ú","U",$valor);
        $valor = str_ireplace(" ","-",$valor); 
        $valor = str_ireplace("#","",$valor);
        $valor = str_ireplace("/","",$valor);

        return $valor;
    }
}
