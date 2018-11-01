<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_soportista extends Controller
{
    public function index($id)
    {	


        $vista=View::make("soportista");

    	$sql_soporte="SELECT t1.id,t1.id_usuario,t1.titulo,upper(t1.codigo) as codigo,t3.nombre_aleatorio as foto FROM tbl_ticket_soporte t1
		LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id_usuario = t2.id_usuario
		LEFT JOIN tbl_archivos t3 ON t3.id=t2.id_foto
		WHERE t1.id_estatus=1";
		
		$sql_conversacion="
			SELECT t1.id as id_tic, upper(t1.codigo) as codigo, t2.id_tikect as id,t2.id_tipo_mensaje,t2.descripcion,t2.id_usuario,t4.nombre_aleatorio FROM tbl_ticket_soporte t1
				LEFT JOIN tbl_conversacion_soporte t2 ON t2.id_tikect = t1.id
				LEFT JOIN tbl_usuarios_foto_perfil t3 ON t3.id_usuario = t2.id_usuario
				LEFT JOIN tbl_archivos t4 ON t4.id = t3.id_foto
			WHERE t1.codigo='".$id."'
			ORDER BY t2.tmp ASC
			";

		try {
			$datos_soporte=DB::select($sql_soporte);
			$conversacion=DB::select($sql_conversacion);
			$vista->datos_soporte=$datos_soporte;
			$vista->datos_mensajes=$conversacion;
			if($id!='0')
			{
				$vista->tikect=$conversacion[0]->id_tic;
			}
            //return "Hola";
			return $vista;
		} catch (Exception $e) {
			
		} 
    }

    public function responder()
    {	

       


    	$sql="INSERT INTO tbl_conversacion_soporte VALUES(
    	null,
    	".$_POST['ticket'].",
    	0,
    	2,
    	'".$_POST['mensaje']."',
    	null
    	);";
    	try {
    		DB::insert($sql); 
    	} catch (Exception $e) {
    		
    	} 
    } 

    public function inicio()
    {	
    	return View('soportista_login');  	
    } 

     public function login(Request $request)
    {	
    	 
    	 $sql="SELECT *,count(id) as cantidad FROM tbl_usuarios_soporte 
    	 WHERE correo=? and clave=?"; 
    	 try {
    	  		$datos=DB::select($sql, [strtolower($_POST['correo']), $_POST['pass']]);
    	  		if($datos[0]->cantidad==1)
    	  		{
    	  			$request->session()->set('soportista_correo', $datos[0]->correo); 
    	  			$request->session()->set('soportista_nombre', $datos[0]->nombre); 
    	  			return Redirect('soportista/0');
    	  		}
    	  		else
    	  		{
    	  			return redirect('loginsoporte?error=Correo o contraseña son incorrectos.');
    	  		}
    	  	} catch (Exception $e) {
    	  		
    	  	} 	
    } 

     public function salir(Request $request)
    {  
        $request->session()->forget('soportista_correo');
        $request->session()->forget('soportista_nombre');
        return redirect('loginsoporte');
    }

}
