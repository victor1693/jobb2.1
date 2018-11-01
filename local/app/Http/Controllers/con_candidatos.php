<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use DB;
class con_candidatos extends Controller
{
    public function index(Request $request)
    {

        return redirect('/');
        if ($request->session()->get("candidato") != null) {
            return redirect("candidashboard");
        } else {
            $condiciones="";
            if(isset($_POST['habilidad']) && count($_POST['habilidad']))
            {
                $bandera=0;
                $temp=""; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['habilidad'] as $key) {
                    if($bandera>=1)
                    {
                        $temp=" or"; 
                    }
                $condiciones=$condiciones." ".$temp." f_habilidades like ('%".$key."%') ";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['idiomas']) && count($_POST['idiomas']))
            {
                $bandera=0;
                $temp=""; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['idiomas'] as $key) {
                    if($bandera>=1)
                    {
                        $temp=" or"; 
                    }
                $condiciones=$condiciones." ".$temp." f_idioma like ('%".$key."%') ";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['cargos']) && count($_POST['cargos']))
            {
                $bandera=0;
                $temp=""; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['cargos'] as $key) {
                    if($bandera>=1)
                    {
                        $temp=" or"; 
                    }
                $condiciones=$condiciones." ".$temp." f_cargos like ('%".$key."%')";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }
     

            if(isset($_POST['provincias']) && count($_POST['provincias']))
            {
                $bandera=0; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['provincias'] as $key) { 
                $condiciones=$condiciones." f_provincia =".$key."";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['localidad']) && count($_POST['localidad']))
            {
                $bandera=0; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['localidad'] as $key) { 
                $condiciones=$condiciones." f_localidad =".$key."";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['disponibilidad']) && count($_POST['disponibilidad']))
            {
                $bandera=0; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['disponibilidad'] as $key) { 
                $condiciones=$condiciones." f_disponibilidad ='".$key."'";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['sexo']) && count($_POST['sexo']))
            {
                $bandera=0; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['localidad'] as $key) { 
                $condiciones=$condiciones." f_sexo =".$key."";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }

            if(isset($_POST['salarios']) && count($_POST['salarios']))
            {
                $bandera=0; 
                $condiciones=$condiciones." AND ("; 
                foreach ($_POST['salarios'] as $key) { 
                $condiciones=$condiciones." f_remuneracion =".$key."";
                $bandera++; 
                }
                $condiciones=$condiciones.")"; 
            }



            $vista=View::make('candidatos');
            $peticion ="SELECT t9.nombre_aleatorio as foto, t1.id, t2.nombres as nombre, t2.apellidos as apellido,concat(t4.provincia,' / ',t5.localidad) as localidades,t3.direccion,t7.nombre as disponibilidad,t10.*";

            $consulta_general="FROM tbl_usuarios t1
                LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
                LEFT JOIN tbl_candidato_info_contacto t3 ON t3.id_usuario = t1.id
                LEFT JOIN tbl_candidato_preferencias_laborales t6 ON t6.id_usuario = t1.id
                LEFT JOIN tbl_disponibilidad t7 ON t7.id = t6.id_jornada
                LEFT JOIN tbl_provincias t4 ON t4.id = t3.id_provincia
                LEFT JOIN tbl_localidades t5 ON t5.id = t3.id_localidad
                LEFT JOIN tbl_usuarios_foto_perfil t8 ON t8.id_usuario = t1.id
                LEFT JOIN tbl_archivos t9 ON t9.id = t8.id_foto
                LEFT JOIN vista_filtros_candidatos_v3 t10 ON t10.f_id = t1.id
                WHERE t1.tipo_usuario = 2 ".$condiciones."
                AND t1.id_estatus = 1
                GROUP BY t1.id
                ";
            
                $sql_candidatos=$peticion."".$consulta_general;
            
             
            $peticion="SELECT t1.id";
            $sql_habilidades="SELECT t2.descripcion,t1.id_habilidad,count(id_habilidad) as cantidad FROM tbl_candidato_habilidades t1
            LEFT JOIN tbl_habilidades t2 ON t2.id=t1.id_habilidad
            WHERE t1.id_usuario in  (".$peticion." ".$consulta_general.")
            GROUP BY t1.id_habilidad";

            $sql_provincias="SELECT t2.provincia,t1.id_provincia,count(t1.id_provincia) as cantidad FROM tbl_candidato_info_contacto t1
                LEFT JOIN tbl_provincias t2 ON t2.id = t1.id_provincia
                LEFT JOIN tbl_usuarios t3 ON t3.id = t1.id_usuario 
                WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
                GROUP BY t1.id_provincia";

            $sql_localidades="SELECT t1.id_usuario,t2.localidad,t1.id_localidad,count(t1.id_localidad) as cantidad FROM tbl_candidato_info_contacto t1
                LEFT JOIN tbl_localidades t2 ON t2.id = t1.id_localidad
                LEFT JOIN tbl_usuarios t3 ON t3.id = t1.id_usuario 
                WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
                GROUP BY t1.id_localidad";  

             
            $sql_disponibilidad="SELECT t1.id_jornada,count(t1.id_jornada) as cantidad,t2.nombre FROM `tbl_candidato_preferencias_laborales` t1
                LEFT JOIN tbl_disponibilidad t2 ON t2.id = t1.id_jornada
                WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
                GROUP BY id_jornada";
            
            $sql_idiomas="SELECT t1.id_idioma,count(t1.id_idioma) as cantidad,t2.descripcion FROM tbl_candidato_idioma t1
            LEFT JOIN tbl_idiomas t2 ON t2.id = t1.id_idioma
            WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
            GROUP BY t1.id_idioma";

            $sql_generos="SELECT t1.id_sexo,count(t1.id_sexo) as cantidad,t2.descripcion FROM tbl_candidato_datos_personales t1
            LEFT JOIN tbl_generos t2 ON t2.id = t1.id_sexo
            WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
            GROUP BY t1.id_sexo";

            $sql_cargos="SELECT t1.id_cargo ,count(t1.id_cargo) as cantidad,t2.descripcion FROM tbl_candidatos_cargos t1
            LEFT JOIN tbl_cargos t2 ON t2.id = t1.id_cargo
            WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
            GROUP BY t1.id_cargo";

            $sql_salarios="SELECT t1.id_remuneracion_pre ,count(t1.id_remuneracion_pre) as cantidad,t2.salario FROM tbl_candidato_preferencias_laborales t1
                LEFT JOIN tbl_rango_salarios t2 ON t2.id = t1.id_remuneracion_pre
                WHERE t1.id_usuario in (".$peticion." ".$consulta_general.")
                GROUP BY t1.id_remuneracion_pre";
             

            try {
                $datos_candidatos=DB::select($sql_candidatos); 
                
                $total_datos_candidatos=DB::select("SELECT COUNT(*) AS count $consulta_general");

                ####### PAGINACIÓN #########
                $tamPag = 20;
                $numReg = count($datos_candidatos);
                $paginas = ceil($numReg/$tamPag);
                $limit = "";
                $paginaAct = "";
                if (!isset($_GET['pag'])) {
                    $paginaAct = 1;
                    $limit = 0;
                } else {
                    $paginaAct = $_GET['pag'];
                    $limit = ($paginaAct-1) * $tamPag;
                }

                $datos_candidatos=DB::select($this->consultaPagination($condiciones,$limit,$tamPag)); 

                $datos_habilidades=DB::select($sql_habilidades);
                $datos_provincias=DB::select($sql_provincias);
                $datos_localidades=DB::select($sql_localidades);
                $datos_disponibilidad=DB::select($sql_disponibilidad);
                $datos_idioma=DB::select($sql_idiomas);
                $datos_generos=DB::select($sql_generos); 
                $datos_cargos=DB::select($sql_cargos); 
                $datos_salarios=DB::select($sql_salarios); 
                

                $vista->datos_generos=$datos_generos;
                $vista->datos_habilidades=$datos_habilidades;
                $vista->datos_provincia=$datos_provincias;
                $vista->datos_localidades=$datos_localidades;
                $vista->datos_disponibilidad=$datos_disponibilidad;
                $vista->datos_idioma=$datos_idioma;
                $vista->datos_cargos=$datos_cargos;
                $vista->datos_salarios=$datos_salarios;
                $vista->datos_candidatos=$datos_candidatos;
                $vista->variables=$_POST;
                $vista->total_datos_candidatos=$total_datos_candidatos[0]->count;
                $vista->paginas=$paginas;
                $vista->paginaAct=$paginaAct;

             return $vista;
            } catch (Exception $e) {
                
            }
        }
    	
    }

    private function consultaPagination($condiciones,$limit,$tamPag)
    {
        $peticion ="SELECT t9.nombre_aleatorio as foto, t1.id, t2.nombres as nombre, t2.apellidos as apellido,concat(t4.provincia,' / ',t5.localidad) as localidades,t3.direccion,t7.nombre as disponibilidad,t10.*";

        $consulta_general="FROM tbl_usuarios t1
            LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
            LEFT JOIN tbl_candidato_info_contacto t3 ON t3.id_usuario = t1.id
            LEFT JOIN tbl_candidato_preferencias_laborales t6 ON t6.id_usuario = t1.id
            LEFT JOIN tbl_disponibilidad t7 ON t7.id = t6.id_jornada
            LEFT JOIN tbl_provincias t4 ON t4.id = t3.id_provincia
            LEFT JOIN tbl_localidades t5 ON t5.id = t3.id_localidad
            LEFT JOIN tbl_usuarios_foto_perfil t8 ON t8.id_usuario = t1.id
            LEFT JOIN tbl_archivos t9 ON t9.id = t8.id_foto
            LEFT JOIN vista_filtros_candidatos_v3 t10 ON t10.f_id = t1.id
            WHERE t1.tipo_usuario = 2 ".$condiciones."

            AND t1.id_estatus = 1 
            GROUP BY t1.id
            LIMIT $limit,$tamPag";

            return $peticion . " " . $consulta_general;
    }

    function evaluacionJobbers(Request $request)
    {
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tbl_evaluacion_jobbers (evaluacion, descripcion) VALUES (?,?)", [$request->evaluacion, $request->descripcion]);
            DB::commit();
            return redirect('detalleoferta/'.$request->id_pub.'?r=1');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('detalleoferta/'.$request->id_pub.'?r=2');
        }
    }

    function test_controlador()
    {
    	//return Redirect('candidatos');
    }
}
