<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_administrator_soportistas extends Controller
{
    
    public function soportistas()
    {
        $vista=View::make("administrator_soportistas");
        $sql="SELECT * FROM tbl_usuarios_soporte;"; 
        try {
            $datos=DB::select($sql);
            $vista->datos=$datos;
            return $vista;
        } catch (Exception $e) {
            
        }
        
    }
       public function nuevo_soportista()
    {

        $sql="INSERT INTO tbl_usuarios_soporte VALUES(null,
        '".$_POST['nombre']."',
        '".$_POST['correo']."',
        '".$_POST['clave']."',
        '".$_POST['funcion']."',1,
        null);";

        try {
            DB::insert($sql);
            return Redirect("administracion/soportistas?result=Nuevo soportista agregado con éxito.");
        } catch (Exception $e) {
            
        }
        //return view('administrator_soportista_nuevo');
    }
       public function actualizar_soportista()
    {
         $sql="UPDATE tbl_usuarios_soporte SET
          correo='".$_POST['correo']."',
          nombre='".$_POST['nombre']."', 
          funcion='".$_POST['funcion']."', 
          clave='".$_POST['clave']."'
          WHERE id=".$_POST['id']."";
          try {
              DB::update($sql);
               return Redirect("administracion/soportistas?result=Soportista actualizaco con éxito.");
          } catch (Exception $e) {
              
          }
    }


       public function soportistas_nuevo()
    {
        return view('administrator_soportista_nuevo');
    }

        public function soportistas_editar($id)
    {
        $vista=View::make("administrator_soportistas_editar");
        $sql="SELECT * FROM tbl_usuarios_soporte WHERE id=".$id."";
        try {
            $datos=DB::select($sql);
            $vista->datos=$datos;
            return $vista;
        } catch (Exception $e) {
            
        } 
    }

    public function soportistas_bloquear($id)
    {
        $sql="UPDATE tbl_usuarios_soporte SET estatus = 0 WHERE id=".$id.";";
        try {
            DB::update($sql);
            return Redirect("administracion/soportistas?result=soportista bloqueado con éxito.");
        } catch (Exception $e) {
            
        }
        return view('administrator_soportistas_editar');
    }

     public function soportistas_desbloquear($id)
    {
        $sql="UPDATE tbl_usuarios_soporte SET estatus = 1 WHERE id=".$id.";";
        try {
            DB::update($sql);
            return Redirect("administracion/soportistas?result=soportista desbloqueado con éxito.");
        } catch (Exception $e) {
            
        }
        return view('administrator_soportistas_editar');
    }
}
