<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Mail;
use View;

class con_login extends Controller
{
    public function log(Request $request)
    { 
        $banderaSocial=0;
        if(isset($_GET['token']) && isset($_GET['user']) && isset($_GET['secure']) && $_GET['token']!="" && $_GET['user']!="" && $_GET['secure']!="")
        {

            $sql="
            SELECT count(id) as total 
            FROM tbl_tokens_social_verification 
            WHERE correo ='".$_GET['user']."' AND  token = '".$_GET['token']."'";
           
            $datos=DB::select($sql);
            if($datos[0]->total==1)
            {
               
                $_POST['correo']=$_GET['user'];
                 $banderaSocial=1;
            } 
            else
            {
                 return Redirect("login?error=Clave o correo incorrectos");
            }
        }
       
       
        $this->limpiarVariablesSession($request);
        $sql="";
        $datos="";
        if($banderaSocial==1)
        {  

        $sql = "
        SELECT t1.*,count(t1.id) as cantidad,t3.nombre_aleatorio as imagen,t1.token FROM tbl_usuarios t1
        LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id = t2.id_usuario
        LEFT JOIN tbl_archivos t3 ON t3.id = t2.id_foto WHERE t1.correo='".$_POST['correo']."'";
         $datos = DB::select($sql);
         } 
         else
         {
              $sql = "
        SELECT t1.*,count(t1.id) as cantidad,t3.nombre_aleatorio as imagen,t1.token FROM tbl_usuarios t1
        LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id = t2.id_usuario
        LEFT JOIN tbl_archivos t3 ON t3.id = t2.id_foto WHERE t1.correo=? AND t1.clave=?";

        $correo = isset($_POST['correo']) ? strtolower($_POST['correo']) : false;
        $pass = isset($_POST['pass']) ? md5($_POST['pass']) : false;
         $datos = DB::select($sql, [$correo, $pass]);
         } 
       

        try {

           
            if ($datos[0]->cantidad) {
                $prefijo = "";
                $sufijo  = "";
                $ruta    = "";
                
                if ($datos[0]->tipo_usuario == 2) {
                    $prefijo = "candidato";
                    $sufijo  = "cand_";
                    $ruta    = "candidashboard";
                }
                
                $request->session()->set($prefijo, $datos[0]->correo);
                $request->session()->set($sufijo . 'id', $datos[0]->id);
                $request->session()->set($sufijo . 'img', $datos[0]->imagen);
                $request->session()->set($sufijo . 'token', $datos[0]->token);
                $request->session()->set('tipo_usuario', $datos[0]->tipo_usuario);
                $sql_contador="INSERT INTO tbl_contador_sesion (id_usuario) VALUES(".$datos[0]->id.")";
                DB::insert($sql_contador);
                if (isset($request->return_url) && isset($request->id_pub)) { // Postulación cuando no tiene iniciada la sesion.
                    $postulado = $this->postular_candidato($datos[0]->id, $request->id_pub);

                    if ($postulado) {
                        return Redirect("detalleoferta/".$request->id_pub);
                    } else {
                        return Redirect("detalleoferta/".$request->id_pub."?info=Ya te encuentras postulado a esta oferta.");
                    }

                } else {

                    return Redirect($ruta);
                }
                // return Redirect($ruta);
            } else {
                return Redirect("login?error=Clave o correo incorrectos");
            }
        } catch (Exception $e) {

        }
    }

    private function postular_candidato($id, $id_pub)
    {
        $bandera = 0;
        $sql     = "
        SELECT count(*) as cantidad
        FROM tbl_postulaciones
        WHERE id_usuario=" . $id . " AND id_publicacion=" . $id_pub . "";
        try {
            $datos = DB::select($sql);
            if ($datos[0]->cantidad == 0) {
                $bandera = 1;
            }
        } catch (Exception $e) {

        }

        if ($bandera) {
            $sql = "INSERT INTO tbl_postulaciones
            VALUES(null,$id,null,$id_pub,null)";
            try {
                DB::insert($sql);
                return true;
            } catch (Exception $e) {

            }
        } else {
            return false;
            // return redirect("detalleoferta/" . $id . "?info=El usuario ya se encuentra postulado.");
        }
    }

    public function salir(Request $request)
    {
        $this->limpiarVariablesSession($request);
        $request->session()->forget('candidato');
        $request->session()->forget('empresa');
        return redirect('inicio');
    }

    public function logincandidato()
    {
        return View("candidato_login");
    }

    public function recuperar()
    {
        return View("recuperar_clave");
    }

    public function enviar() //Envia el correo con la nueva clave

    {
        if (isset($_POST['correo']) && $_POST['correo'] != "") {
            $sql = "SELECT count(*) as cantidad FROM tbl_usuarios WHERE correo ='" . $_POST['correo'] . "'";
            try {
                $datos = DB::select($sql);
                if ($datos[0]->cantidad) {
                    $clave = $this->aleatorio(10);
                    $sql   = "UPDATE tbl_usuarios SET clave='" . md5($clave) . "' WHERE correo = '" . $_POST['correo'] . "'";
                    try {

                        DB::update($sql);
                        $data = [
                            'clave' => $clave,
                        ];
                        Mail::send("email.recuperar", $data, function ($message) {
                            $message->to($_POST['correo']);
                            $message->from("no-reply@jobbers.com");
                            $message->subject("no-reply@jobbers.com");
                        });
                        return redirect("login?info=La clave ha sido enviada a su correo.");
                    } catch (Exception $e) {
                        return redirect("recuperarclave?info=Ha ocurrido un error");
                    }
                } else {
                    return redirect("recuperarclave?info=Este correo no se encuentra registrado.");
                }
            } catch (Exception $e) {

            }
        } else {
            return redirect("login?info=Debe completar el campo de correo.");
        }

    }

    public function aleatorio($length)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function limpiarVariablesSession(Request $request)
    {
        $request->session()->forget('candidato');
        $request->session()->forget('empresa');
        $request->session()->forget('cand_id');
        $request->session()->forget('emp_id');
        $request->session()->forget('admin');
        $request->session()->forget('adm_id');
        $request->session()->forget('adm_nombre');
        $request->session()->forget('adm_img');
        $request->session()->forget('emp_img');
        $request->session()->forget('cand_img');
        $request->session()->forget('adm_token');
        $request->session()->forget('emp_token');
        $request->session()->forget('cand_token');
        $request->session()->forget('tipo_usuario');
        $request->session()->flush();
    }

    public function vregreferidos($token, $tipo)
    {
        $vista        = View::make("register_referido");
        $vista->token = $token;
        $vista->tipo  = $tipo;
        return $vista;
    }
    public function register(Request $request)
    {
        $correo = trim(strtolower($_POST['correo']));
        
        $sql = "INSERT INTO tbl_usuarios(correo,usuario,clave,tipo_usuario,token,id_estatus,token_referido)VALUES(?,'',?,?,?,1,'')"; 
        $existEmail = DB::select("SELECT id FROM tbl_usuarios WHERE correo=?", [$correo]); 
        $prefijo = "";
        $sufijo = "";
        $ruta = "";

        if (!$existEmail) {
            try {
                DB::insert($sql, [$correo, md5($_POST['pass']), '2', $this->aleatorio(45)]);
                $id_usuario = DB::getPdo()->lastInsertId();

                $sql = "
                        SELECT t1.*,count(t1.id) as cantidad,t3.nombre_aleatorio as imagen,t1.token FROM tbl_usuarios t1
                        LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id = t2.id_usuario
                        LEFT JOIN tbl_archivos t3 ON t3.id = t2.id_foto WHERE t1.correo=? AND t1.clave=?";

                $datos = DB::select($sql, [$correo, md5($_POST['pass'])]);

                if ($datos[0]->tipo_usuario == 2) {
                    $prefijo = "candidato";
                    $sufijo  = "cand_";
                    $ruta    = "candidashboard";
                }
                
                $request->session()->set($prefijo, $datos[0]->correo);
                $request->session()->set($sufijo . 'id', $datos[0]->id);
                $request->session()->set($sufijo . 'img', $datos[0]->imagen);
                $request->session()->set($sufijo . 'token', $datos[0]->token);
                $request->session()->set('tipo_usuario', $datos[0]->tipo_usuario);
                return Redirect($ruta);
                // return Redirect("login?success=Registrado satisfactoriamente");
            } catch (Exception $e) {

            }
        } 
        else {
            return Redirect("login?error=El correo que ud ha introducido está en uso");
        }
    }

    public function existEmail()
    {
        $correo = $_POST['correo'];
        $respuesta = '';

        $existe = DB::select("SELECT id FROM tbl_usuarios WHERE correo=?", [strtolower($correo)]);

        if ($existe) {
            $respuesta = 1;
        } else {
            $respuesta = 2;
        }

        echo json_encode([
            "data" => $respuesta
        ]);
    }

    public function regReferido()
    {
        $sql = "
        INSERT INTO tbl_usuarios
        VALUES(null,'" . $_POST['correo'] . "','','" . md5($_POST['clave']) . "'," . $_POST['tipo'] . ",'" . $this->aleatorio(45) . "',1,'" . $_POST['token'] . "',null)";
        try {
            DB::insert($sql);
            $this->addPuntos($_POST['token']);
            return Redirect("login");
        } catch (Exception $e) {

        }
    }

    public function addPuntos($token)
    {

        $sql_id = "SELECT id FROM tbl_usuarios WHERE token='" . $token . "'";
        try {
            $datos = DB::select($sql_id);
            $sql   = "INSERT INTO tbl_puntos VALUES(null," . $datos[0]->id . ",5,null)";
            try {
                DB::insert($sql);
            } catch (Exception $e) {

            }
        } catch (Exception $e) {

        }
    }
}
