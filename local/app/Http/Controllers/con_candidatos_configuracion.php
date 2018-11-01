<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class con_candidatos_configuracion extends Controller
{
    public function index()
    {
        $vista = View::make("candidatos_configuracion");

        $sql        = "SELECT correo FROM tbl_usuarios WHERE id = " . session()->get('cand_id') . "";
        $sql_imagen = "SELECT * FROM tbl_archivos
        WHERE id_usuario = " . session()->get("cand_id") . "";
        $sql_pic = "SELECT count(t1.id) as cantidad,t2.nombre_aleatorio FROM tbl_usuarios_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto WHERE t1.id_usuario=" . session()->get("cand_id") . "";
        $con_imagen = 0;
        try {
            $datos         = DB::select($sql);
            $imagen        = DB::select($sql_imagen);
            $pic           = DB::select($sql_pic);
            $vista->datos  = $datos;
            $vista->imagen = $imagen;

            if ($pic[0]->cantidad == 1) {
                $con_imagen = 1;
            }
            $vista->con_imagen = $con_imagen;
            $vista->pic        = $pic;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function setProfilePic(Request $request)
    {
        
        $sql       = "SELECT count(*) as cantidad FROM tbl_usuarios_foto_perfil WHERE id_usuario = " . session()->get("cand_id") . "";
        $sql_agregar = "INSERT INTO tbl_usuarios_foto_perfil
        VALUES(null," . session()->get("cand_id") . "," . $_POST['id_imagen'] . ",null)";
        $sql_act = "UPDATE tbl_usuarios_foto_perfil
        SET id_foto = " . $_POST['id_imagen'] . " WHERE id_usuario = " . session()->get("cand_id") . "";
        try {
            $datos = DB::select($sql);
            if ($datos[0]->cantidad) {
                DB::update($sql_act);
                $sql = "SELECT t2.nombre_aleatorio FROM tbl_usuarios_foto_perfil t1 LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto
                WHERE t1.id_usuario=" . session()->get("cand_id") . "";
                $datos = DB::select($sql);
                $request->session()->set("cand_img", $datos[0]->nombre_aleatorio);
                $this->porcentaje_carga(1,"foto",$_GET);
                return Redirect("candiconfiguracion?info=Imagen actualizada con extito.");
            } else {
                DB::insert($sql_agregar);
                $this->porcentaje_carga(1,"foto",$_GET);
                return Redirect("candiconfiguracion?info=Imagen actualizada con extito.");
            }
        } catch (Exception $e) {

        }
    }

    public function actualizardatos()
    {
        if (isset($_POST['correo']) && isset($_POST['clave']) && $_POST['correo'] != "" && $_POST['clave'] != "") {
            $sql = "SELECT count(correo) as cantidad,correo FROM tbl_usuarios WHERE correo='" . $_POST['correo'] . "'";
            try {
                $datos = DB::select($sql);
                if ($datos[0]->cantidad) {
                     $sql = "UPDATE tbl_usuarios SET clave='" . md5($_POST['clave']) . "' WHERE id=" . session()->get("cand_id")."";
                    try {
                        DB::update($sql);
                        return Redirect("candiconfiguracion?result=Clave cambiada con exito.");
                    } catch (Exception $e) {

                    }
                }  
            } catch (Exception $e) {

            }
        } else {
            return Redirect("candiconfiguracion?info=Debe colocar correo y clave para la actualización en sistema.");
        }
    }

    public function porcentaje_carga($resta,$campo,$arreglo)
       {
            $valor=$resta;
            foreach ($arreglo as $key) {
                if ($key!="") {
                    $valor++;
                }
            } 
      
            $sql="SELECT count(id) as cantidad FROM tbl_candidato_porcentaje_carga WHERE id_usuario = ".session()->get('cand_id')."";
            $sql_actualizar="UPDATE tbl_candidato_porcentaje_carga SET ".$campo." = ".$valor." 
            WHERE id_usuario =".session()->get('cand_id')."";
            $sql_insertar="INSERT INTO tbl_candidato_porcentaje_carga (".$campo.",id_usuario) VALUES (".$valor.",".session()->get('cand_id').")";
            try {
                $datos=DB::select($sql);
                if($datos[0]->cantidad==1)
                {
                    DB::update($sql_actualizar);
                }
                else
                {
                    DB::insert($sql_insertar);
                }
                
            } catch (Exception $e) {
                
            }
       }

}
