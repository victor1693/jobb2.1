<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use DB;
class con_soporte extends Controller
{
	public function soporte_detalle_candidato()
{
	$vista=View::make("candidato_soporte_detalle");
	$sql="SELECT t1.id, UPPER(t1.codigo) as codigo,t2.descripcion FROM tbl_ticket_soporte t1
	LEFT JOIN tbl_estatus_soporte t2 ON t2.id =t1.id_estatus
	WHERE t1.id_usuario = ".session()->get('cand_id')."";
	try {
		$datos=DB::select($sql);
		$vista->datos=$datos;
		return $vista;
	} catch (Exception $e) {
		
	}
	
	}
	public function mensajes_cand()
{
	$id=$_POST['codigo'];
	$sql_mensajes="SELECT count(t2.id) as cantidad FROM `tbl_ticket_soporte` t1
	LEFT JOIN tbl_conversacion_soporte t2 ON t2.id_tikect = t1.id
	WHERE t1.codigo = '".$id."'";
	try {
		$datos_mensajes=DB::select($sql_mensajes);
		if($datos_mensajes[0]->cantidad > $_POST['cantidad'])
		{
			$sql_mensajes="SELECT t1.*,t2.id_tipo_mensaje,t2.descripcion as mensaje FROM tbl_ticket_soporte t1
			LEFT JOIN tbl_conversacion_soporte t2 ON t2.id_tikect = t1.id
			WHERE t1.codigo = '".$id."' limit ".$_POST['cantidad'].", ".( $datos_mensajes[0]->cantidad - $_POST['cantidad'])."";
			
			$datos_mensajes=DB::select($sql_mensajes);
			echo json_encode($datos_mensajes);
		}
	} catch (Exception $e) {
		
	}
	
}

public function add_mensajes_cand()
{
 	$sql="INSERT INTO tbl_conversacion_soporte VALUES(
 	null,
 	".$_POST['ticket'].",
 	".session()->get('cand_id').",
 	1,
 	'".$_POST['mensaje']."', 
 	null
 	);";

 	try {
 		DB::insert($sql);
 		 
 	} catch (Exception $e) {
 		
 	}
}
	public function detalle($id)
{
	$vista=View::make("candidato_soporte_detalle");
	$sql="SELECT t1.titulo, t1.id, UPPER(t1.codigo) as codigo,t2.descripcion,t2.tmp FROM tbl_ticket_soporte t1
	LEFT JOIN tbl_estatus_soporte t2 ON t2.id =t1.id_estatus
	WHERE t1.id_usuario = ".session()->get('cand_id')."";

	$sql_mensajes="SELECT t1.*,t2.id_tipo_mensaje,t2.descripcion FROM `tbl_ticket_soporte` t1
	LEFT JOIN tbl_conversacion_soporte t2 ON t2.id_tikect = t1.id
	WHERE t1.codigo = '".$id."'";
	try {
		$datos=DB::select($sql);
		$datos_mensajes=DB::select($sql_mensajes);
		$vista->datos=$datos;
		$vista->datos_mensajes=$datos_mensajes;
		return $vista;
	} catch (Exception $e) {
		
	}
	
	}
	public function candidato()
{
	$vista=View::make("candidato_soporte");
	$sql="SELECT t1.id, UPPER(t1.codigo) as codigo,t2.descripcion,t3.id as conver FROM tbl_ticket_soporte t1
	LEFT JOIN tbl_conversacion_soporte t3 ON t3.id_tikect = t1.id
	LEFT JOIN tbl_estatus_soporte t2 ON t2.id =t1.id_estatus
	WHERE t1.id_usuario = ".session()->get('cand_id')."
	GROUP BY t1.id
	";
	try {
		$datos=DB::select($sql);
		$vista->datos=$datos;
		return $vista;
	} catch (Exception $e) {
		
	}
	
}
	public function add_suport_candidato()
{
	try {
		$this->add_suport(session()->get('cand_id'),$_POST['categoria'],2,$_POST['titulo'],$_POST['detalle']);
		return Redirect('candisoporte');
	} catch (Exception $e) {
		
	}
}
public function add_suport($usuario,$categoria,$tipo,$titulo,$detalle)
{
	$codigo=$this->codigo(15);
	$sql="INSERT INTO tbl_ticket_soporte VALUES(
	null,
	".$usuario.",
	".$categoria.",
	1,
	".$tipo.",
	'".$titulo."',
	'".$detalle."',
	'".$codigo."',
	null);";
	try {
		DB::insert($sql);
	} catch (Exception $e) {
		
	}
}
public function codigo($longitud)
{
$tipo=0;
//creamos la variable codigo
$codigo = "";
//caracteres a ser utilizados
$caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//el maximo de caracteres a usar
$max=strlen($caracteres)-1;
//creamos un for para generar el codigo aleatorio utilizando parametros min y max
for($i=0;$i < $longitud;$i++)
{
$codigo.=$caracteres[rand(0,$max)];
}
//regresamos codigo como valor
return $codigo;
}
}