<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class con_ofertas extends Controller
{
    public function index()
    {
         $provincias_cordoba=DB::select("SELECT * FROM tbl_localidades where id_provincia = 7;");
        $vista = View::make("ofertas");

        $condiciones = "";

        if(isset($_POST['title']))
        {
            
            $condiciones .= " AND t1.titulo LIKE '%$_POST[title]%'";
        }

        if(isset($_POST['provincia_index']) && $_POST['provincia_index'] != "")
        {
            
            $condiciones .= " AND t1.id_provincia = $_POST[provincia_index]";
        }

        if(isset($_POST['antiguedad']))
        {
            if ($_POST["antiguedad"] != 1) {
                
                $values = [
                    " AND DATE_FORMAT(t1.tmp,'%Y-%m-%d')=CURDATE()", // Hoy
                    " AND t1.tmp BETWEEN (CURDATE()-7) AND CURDATE()", // Ultima Semana
                    " AND t1.tmp BETWEEN (CURDATE()-30) AND CURDATE()" // Ultimos 30 días
                ];
                
                $condiciones .= $values[$_POST["antiguedad"] - 2];
            }
        }

        if(isset($_POST['provincias']) && count($_POST['provincias']))
        {
            $temp= []; 
            foreach ($_POST['provincias'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_provincia IN (".implode(",", $temp).")";
        }

        if(isset($_POST['planes_estado']) && count($_POST['planes_estado']))
        {
            $temp= []; 
            foreach ($_POST['planes_estado'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_plan_estado IN (".implode(",", $temp).")";
        }

        if(isset($_POST['localidades']) && count($_POST['localidades']))
        {
            $temp= []; 
            foreach ($_POST['localidades'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_localidad IN (".implode(",", $temp).")";
        }

        if(isset($_POST['disponibilidades']) && count($_POST['disponibilidades']))
        {
            $temp= []; 
            foreach ($_POST['disponibilidades'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_disponibilidad IN (".implode(",", $temp).")";
        }

        if(isset($_POST['areas']) && count($_POST['areas']))
        {
            $temp= []; 
            foreach ($_POST['areas'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_area IN (".implode(",", $temp).")";
        }

        if(isset($_POST['sectores']) && count($_POST['sectores']))
        {
            $temp= []; 
            foreach ($_POST['sectores'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_sector IN (".implode(",", $temp).")";
        }

        if(isset($_POST['salarios']) && count($_POST['salarios']))
        {
            $temp= []; 
            foreach ($_POST['salarios'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_salario IN (".implode(",", $temp).")";
        }

        if(isset($_POST['experiencias']) && count($_POST['experiencias']))
        {
            $temp= []; 
            foreach ($_POST['experiencias'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_experiencia IN (".implode(",", $temp).")";
        }

        if(isset($_POST['generos']) && count($_POST['generos']))
        {
            $temp= []; 
            foreach ($_POST['generos'] as $key) {
                $temp[] = $key;
            }

            $condiciones .= " AND t1.id_genero IN (".implode(",", $temp).")";
        }


        $peticion ="SELECT t1.direccion, t1.id, t1.id_empresa, t1.confidencial, t2.nombre_aleatorio as imagen,t3.nombre, (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=t1.id_empresa) AS q_ofertas,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,t1.fecha_venc,t1.vistos,t1.tmp,t9.id_plan,REPLACE(LCASE(t11.plan),' ','-') AS plan_estado";

        $consulta_general="FROM tbl_publicacion t1
            LEFT JOIN tbl_archivos t2 ON t1.id_imagen = t2.id
            LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
            LEFT JOIN tbl_empresas_planes t9 ON t1.id_empresa = t9.id_empresa
            LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
            LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id
            LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
            LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
            LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
            LEFT JOIN tbl_planes_estado t11 ON t1.id_plan_estado=t11.id
            WHERE t1.estatus = 1 ".$condiciones."
            GROUP BY t1.id";

        // return $consulta_general;
        
        $sql_ofertas=$peticion." ".$consulta_general;

        // return $sql_ofertas;

        $peticion="SELECT t1.id";

        $sql_antiguedad = "SELECT
                            (
                            SELECT COUNT(id) FROM tbl_publicacion WHERE estatus=1
                            ) AS cantidad_todo,
                            (
                            SELECT COUNT(id) FROM tbl_publicacion WHERE estatus=1 AND DATE_FORMAT(tmp,'%Y-%m-%d')=CURDATE()
                            ) AS cantidad_hoy,
                            (
                            SELECT COUNT(id) FROM tbl_publicacion WHERE estatus=1 AND tmp BETWEEN (CURDATE()-7) AND CURDATE()
                            ) AS cantidad_last_week,
                            (
                            SELECT COUNT(id) FROM tbl_publicacion WHERE estatus=1 AND tmp BETWEEN (CURDATE()-30) AND CURDATE()
                            ) AS cantidad_last_thirty_days";

        $sql_disponibilidad = "SELECT d.nombre, t1.id_disponibilidad, COUNT(t1.id_disponibilidad) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_disponibilidad d ON t1.id_disponibilidad=d.id WHERE t1.estatus=1 $condiciones AND t1.id_disponibilidad IN (SELECT t1.id_disponibilidad $consulta_general) GROUP BY t1.id_disponibilidad";
        $sql_sector         = "SELECT a_sec.nombre, t1.id_sector, COUNT(t1.id_sector) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_areas_sectores a_sec ON t1.id_sector=a_sec.id WHERE t1.estatus=1 $condiciones AND t1.id_sector IN (SELECT t1.id_sector $consulta_general) GROUP BY t1.id_sector ORDER BY COUNT(t1.id_sector) desc";
        $sql_area           = "SELECT a.nombre, t1.id_area, COUNT(t1.id_area) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_areas a ON t1.id_area=a.id WHERE t1.estatus=1 $condiciones AND t1.id_area IN (SELECT t1.id_area $consulta_general) GROUP BY t1.id_area ORDER BY COUNT(t1.id_area) desc";
        $sql_salario        = "SELECT s.salario, t1.id_salario, COUNT(t1.id_salario) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_rango_salarios s ON t1.id_salario=s.id WHERE t1.estatus=1 $condiciones AND t1.id_salario IN (SELECT t1.id_salario $consulta_general) GROUP BY t1.id_salario";
        $sql_genero         = "SELECT g.descripcion, t1.id_genero, COUNT(t1.id_genero) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_generos g ON t1.id_genero=g.id WHERE t1.estatus=1 $condiciones AND t1.id_genero IN (SELECT t1.id_genero $consulta_general) GROUP BY t1.id_genero";
        $sql_provincias     = "SELECT pv.provincia, t1.id_provincia, COUNT(t1.id_provincia) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_provincias pv ON t1.id_provincia=pv.id WHERE t1.estatus=1 $condiciones AND t1.id_provincia IN (SELECT t1.id_provincia $consulta_general) GROUP BY t1.id_provincia";
        $sql_localidades    = "SELECT l.localidad, t1.id_localidad, COUNT(t1.id_localidad) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_localidades l ON t1.id_localidad=l.id WHERE t1.estatus=1 $condiciones AND t1.id_localidad IN (SELECT t1.id_localidad $consulta_general) GROUP BY t1.id_localidad ORDER BY COUNT(t1.id_localidad) desc;";
        $sql_experiencia    = "SELECT e.descripcion, t1.id_experiencia, COUNT(t1.id_experiencia) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_experiencia e ON t1.id_experiencia=e.id WHERE t1.estatus=1 $condiciones AND t1.id_experiencia IN (SELECT t1.id_experiencia $consulta_general) GROUP BY t1.id_experiencia";

        $sql_planes_estado    = "SELECT pe.plan, t1.id_plan_estado, COUNT(t1.id_plan_estado) AS cantidad FROM tbl_publicacion t1 LEFT JOIN tbl_planes_estado pe ON t1.id_plan_estado=pe.id WHERE t1.estatus=1 $condiciones AND t1.id_plan_estado IN (SELECT t1.id_plan_estado $consulta_general) GROUP BY t1.id_plan_estado";

        $condicion=0;
        if(session()->get("cand_id")!=null && session()->get("cand_id")=='')
        {
            $condicion=session()->get("cand_id");
        } 
        $sql_favoritos      = "SELECT t1.id,t2.id_referencia FROM tbl_publicacion t1
        LEFT JOIN tbl_favoritos t2 ON t2.id_referencia =t1.id AND t2.id_tipo = 3 AND t2.id_usuario=" .$condicion. "";

        try {
            //$antiguedad=DB::select($sql_antiguedad);
            $antiguedad = DB::select($sql_antiguedad);
            $disponibilidad = DB::select($sql_disponibilidad);
            $sector         = DB::select($sql_sector);
            $area           = DB::select($sql_area);
            $salario        = DB::select($sql_salario);
            $genero         = DB::select($sql_genero);
            $provincia      = DB::select($sql_provincias);
            $localidad      = DB::select($sql_localidades);
            $experiencia    = DB::select($sql_experiencia);
            $planes_estado  = DB::select($sql_planes_estado);
            $favoritos      = DB::select($sql_favoritos);

            $publicaciones = DB::select($sql_ofertas);
            $totalPublicaciones = count($publicaciones);

            ####### PAGINACIÓN ########

            $tamPag = 20;
            $numReg = count($publicaciones);
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

            $sql_ofertas = $this->consultaPagination($condiciones, $limit, $tamPag);

            $publicaciones = DB::select($sql_ofertas);

            // dd($publicaciones);

            //$vista->antiguedad=$antiguedad;
            $vista->favoritos      = $favoritos;
            $vista->antiguedad = $antiguedad;
            $vista->disponibilidad = $disponibilidad;
            $vista->sector         = $sector;
            $vista->experiencia    = $experiencia;
            $vista->area           = $area;
            $vista->salario        = $salario;
            $vista->genero         = $genero;
            $vista->provincia      = $provincia;
            $vista->localidad      = $localidad;
            $vista->planes_estado  = $planes_estado;
            $vista->publicaciones  = $publicaciones;
            $vista->variables  = $_POST;
            $vista->paginas  = $paginas;
            $vista->paginaAct  = $paginaAct;
            $vista->totalPublicaciones  = $totalPublicaciones;
            $vista->total_provincias = $provincias_cordoba;
            return $vista;
        } catch (Exception $e) {

        }
    }

    private function consultaPagination($condiciones, $limit, $tamPag)
    {
        
        $peticion ="SELECT t1.direccion, t1.id, t1.id_empresa, t1.confidencial, t1.id_modalidad_publicacion AS modalidad, t2.nombre_aleatorio as imagen,t3.nombre, t3.web, t3.facebook, t3.twitter, t3.instagram, t3.linkedin, (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=t1.id_empresa) AS q_ofertas,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,DATE_FORMAT(t1.fecha_venc, '%d/%m/%Y') AS fecha_venc,t1.vistos,IF(DATE_FORMAT(t1.tmp, '%Y-%m-%d')=CURDATE(),'Hoy',DATE_FORMAT(t1.tmp, '%d/%m')) AS fecha_pub, DATE_FORMAT(t1.tmp, '%h:%i %p') AS hora_pub,t9.id_plan,REPLACE(LCASE(t11.plan),' ','-') AS plan_estado";

        $consulta_general="FROM tbl_publicacion t1
            LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
            LEFT JOIN tbl_usuarios_foto_perfil t10 ON t3.id_usuario = t10.id_usuario
            LEFT JOIN tbl_archivos t2 ON t10.id_foto = t2.id
            LEFT JOIN tbl_empresas_planes t9 ON t1.id_empresa = t9.id_empresa
            LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
            LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id
            LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
            LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
            LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
            LEFT JOIN tbl_planes_estado t11 ON t1.id_plan_estado=t11.id 
            WHERE t1.estatus = 1 ".$condiciones."
            GROUP BY t1.id ORDER BY t1.tmp DESC LIMIT $limit,$tamPag";

            return $peticion . " " . $consulta_general;
    }

    public function detalle($id, Request $request)
    {

       



        $estatus = " AND t1.estatus = 1";

        if (isset($request->ref) && $request->ref == '_panelEmpresa') {
            $estatus = "";
        }

        DB::update("UPDATE tbl_publicacion SET vistos=(vistos + 1) WHERE id=?",[$id]);

        $vista = View::make('detalle_oferta');
        $sql   = "
        SELECT t2.id as id_empresa, 
        t1.tmp,
        t1.id, 
        t1.titulo,
        t1.discapacidad,
        t1.vistos,
        t1.descripcion,
        t1.id_experiencia,
        t1.id_genero,
        t1.fecha_venc,
        t1.direccion,
        t1.estatus,
        t1.video_youtube AS video,
        t1.confidencial,
        IF(t1.id_salario <> 1, CONCAT(t10.salario,'$'), t10.salario) AS salario,
        t1.salario_usuario,
        t9.nombre,
        t7.nombre as sector,
        t8.nombre as area,
        t2.nombre as empresa,
        t2.web,
        t2.facebook,
        t2.linkedin,
        t2.twitter,
        t2.instagram,
        IF(t6.nombre_aleatorio is null,
        'empresa.jpg',
        t6.nombre_aleatorio) as imagen,

            concat(t3.provincia,' / ',t4.localidad) as dir_empresa FROM tbl_publicacion t1
            LEFT JOIN tbl_empresa t2 ON t2.id = t1.id_empresa
            LEFT JOIN tbl_provincias t3 ON t3.id = t1.id_provincia
            LEFT JOIN tbl_localidades t4 ON t4.id = t1.id_localidad
            LEFT JOIN tbl_usuarios_foto_perfil t5 ON t5.id_usuario = t2.id_usuario
            LEFT JOIN tbl_archivos t6 ON t6.id = t5.id_foto
            LEFT JOIN tbl_areas_sectores t7 ON t7.id = t1.id_sector
            LEFT JOIN tbl_areas t8 ON t8.id = t1.id_area
            LEFT JOIN tbl_disponibilidad t9 ON t9.id = t1.id_disponibilidad
            LEFT JOIN tbl_rango_salarios t10 ON t1.id_salario=t10.id
            WHERE t1.id = " . $id . " $estatus";

        try {
            $datos                = DB::select($sql);
            $salarios = DB::select("SELECT id, IF(id <> 1,CONCAT('$',salario),salario) AS salario FROM tbl_rango_salarios");
            $vista->datos         = $datos;
            $vista->salarios         = $salarios;
            $sql_cantidad_ofertas = "
                SELECT count(*) as cantidad
                FROM tbl_publicacion t1
                WHERE id_empresa= " . $datos[0]->id_empresa . " ".$estatus." GROUP by id_empresa";

           

            $postulado = false;
            if (session()->get('candidato') != null) {
                $check = DB::select("SELECT id FROM tbl_postulaciones WHERE id_usuario=? AND id_publicacion=?", [session()->get('cand_id'), $datos[0]->id]);
                if ($check) {
                    $postulado = true;
                }
            }

            $sql_cantidad_ofertas = "
                SELECT count(*) as cantidad
                FROM tbl_publicacion t1
                WHERE id_empresa= " . $datos[0]->id_empresa . " ".$estatus." GROUP by id_empresa";
            $cantidad_postulados = DB::select("SELECT COUNT(*) AS count FROM tbl_postulaciones WHERE id_publicacion=?", [$id]);
            $vista->cantidad_postulados = $cantidad_postulados[0]->count;
            $cantidad_ofertas        = DB::select($sql_cantidad_ofertas);
            $vista->cantidad_ofertas = $cantidad_ofertas;
            $vista->nivel_user=$this->nivel_usuario();
            $vista->postulado = $postulado;
            
            return $vista;
        } catch (Exception $e) {

        }

    }

    public function nivel_usuario()
    {
         
            if(session()->get('candidato') != null)
            {   
                $contador=1;
                $id=session()->get('cand_id');
                $sql_datos_personales="SELECT * FROM tbl_candidato_datos_personales WHERE id_usuario=".$id."";
                $sql_datos_educacion="SELECT * FROM tbl_candidatos_educacion WHERE id_usuario=".$id."";
                $sql_experiencia_lab="SELECT * FROM tbl_candidato_experiencia_laboral WHERE id_usuario=".$id."";
                $sql_contacto="SELECT * FROM tbl_candidato_info_contacto WHERE id_usuario=".$id."";
                $sql_preferencias="SELECT * FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".$id."";
               
                $dp=DB::select($sql_datos_personales);
                $ded=DB::select($sql_datos_educacion); 
                $del=DB::select($sql_experiencia_lab);
                $datos_contacto=DB::select($sql_contacto);
                $datos_preferencias=DB::select($sql_preferencias);
                
                        if((isset($dp[0]->nombres) && $dp[0]->nombres!=""))
                        { 
                            $contador++;
                        } 
                        if((isset($dp[0]->apellidos) && $dp[0]->apellidos!=""))
                        {
                            $contador++;
                        } 
                        if((isset($dp[0]->n_identificacion) && $dp[0]->n_identificacion!=""))
                        {
                             $contador++;
                        } 
                        if((isset($dp[0]->id_discapacidad) && $dp[0]->id_discapacidad!=""))
                        {
                            $contador++;
                        } 
                        if((isset($dp[0]->fecha_nac) && $dp[0]->fecha_nac!=""))
                        {
                            $contador++;
                        } 
                        if((isset($dp[0]->id_sexo) && $dp[0]->id_sexo!=""))
                        {
                             $contador++;
                        } 
                        if((isset($ded[0]->id) && $ded[0]->id!=""))
                        {
                             $contador++;
                        } 
                        if((isset($del[0]->id) && $del[0]->id!=""))
                        {
                             $contador++;
                        } 
                        if((isset($datos_contacto[0]->id) && $datos_contacto[0]->id!=""))
                        {
                             $contador++;
                        } 
                        if((isset($datos_preferencias[0]->id_remuneracion_pre) && $datos_preferencias[0]->id_remuneracion_pre!=""))
                        {
                             $contador++;
                        } 
                        if((isset($datos_preferencias[0]->id) && $datos_preferencias[0]->id!=""))
                        {
                             $contador++;
                        } 

                        if(($contador/12)==1)
                        {
                            return 1;
                        }
                        else
                        {
                            return 2;
                        }
            }
            else
            {
                return 0;
            } 
    }
}
