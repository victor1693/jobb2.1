<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_administrator_configuracion extends Controller
{
    public function index()
    {
    	$vista=View::make("administrator_cambio_clave");
         return $vista;
    	$sql="SELECT * FROM tbl_administrador";
        try {
          $datos=DB::select($sql);
          $vista->datos=$datos;
         
        } catch (Exception $e) {
        	
        }
        
    }

     public function actualizar()
    {
        $sql="UPDATE tbl_usuarios SET clave='".md5($_POST['clave'])."' WHERE correo='".$_POST['correo']."'";
        try {
            if($_POST['correo']=="")
            {
                return Redirect("administracion/configuracion?result=Debe colocar el correo.");
            }
            else if($_POST['clave']=="")
            {
                return Redirect("administracion/configuracion?result=Debe colocar el la clave");
            }
            else
            {
                DB::update($sql);
                return Redirect("administracion/configuracion?result=Datos actualizados con éxito.");
            } 
        	
        } catch (Exception $e) {
        	return Redirect("administracion/configuracion?result=Ocurrió un error al actualizar los datos");
        }
        
    } 

    public function actualizarempresa()
    {
        $sql="UPDATE tbl_company SET clave='".md5($_POST['clave'])."' WHERE correo='".$_POST['correo']."'";
        try {
            if($_POST['correo']=="")
            {
                return Redirect("administracion/configuracion?result=Debe colocar el correo.");
            }
            else if($_POST['clave']=="")
            {
                return Redirect("administracion/configuracion?result=Debe colocar el la clave");
            }
            else
            {
                DB::update($sql);
                return Redirect("administracion/configuracion?result=Datos actualizados con éxito.");
            } 
            
        } catch (Exception $e) {
            return Redirect("administracion/configuracion?result=Ocurrió un error al actualizar los datos");
        }
        
    } 
}
