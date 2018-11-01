<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;

class con_company_home extends Controller
{
    public function index()
    {
    	$vista=View::make('empresas.index');
    	$sql_ofertas_jobbers="SELECT count(*) as cantidad FROM tbl_company_ofertas WHERE estatus =1";
    	$sql_candidatos_jobbers="SELECT count(*) as cantidad FROM tbl_usuarios WHERE tipo_usuario=2";
    	$sql_company="SELECT count(*) as cantidad FROM tbl_company WHERE estatus=1";

    	$sql_ofertas_empresa="SELECT count(*) as cantidad FROM tbl_company_ofertas  
    	WHERE id_empresa=".session()->get('company_id')."  AND plantilla !='SI' GROUP BY id_empresa";
    	$sql_postulados_empresa="
    	SELECT count(t1.id_empresa) as cantidad FROM tbl_company_ofertas t1
		INNER JOIN tbl_company_postulados t2 ON t2.id_oferta = t1.id
		WHERE id_empresa=".session()->get('company_id')."";
    	
        $sql_plantillas="
        SELECT count(id) AS cantidad
        FROM tbl_company_ofertas
        WHERE plantilla ='SI' AND  id_empresa=".session()->get('company_id')."";

        $sql_promos="SELECT t2.id_promocion,t2.fecha_ven FROM tbl_promociones t1
        LEFT JOIN tbl_company_promociones t2 ON t2.id_promocion = t1.id
         WHERE t1.estatus = 1 AND t2.id_empresa =".session()->get('company_id')."";
      
        $vista->promos = DB::select($sql_promos);        
    	$vista->oferta_total = DB::select($sql_ofertas_jobbers);
        $vista->oferta_plantillas = DB::select($sql_plantillas);
    	$vista->candidato_total = DB::select($sql_candidatos_jobbers);
    	$vista->empresas = DB::select($sql_company);
    	$vista->ofertas_empresa = DB::select($sql_ofertas_empresa);
    	$vista->postulados_empresa = DB::select($sql_postulados_empresa);
        $vista->recomendados = $this->recomendacion(); 
    	return $vista;
      
    }

    public function recomendacion()
    {
       
       $datos_finales = array();
        $sql_ofertas_empresa="
        SELECT * 
        FROM tbl_company_ofertas 
        WHERE id_empresa=".session()->get('company_id')." AND plantilla !='SI' AND estatus = 1";
        $ofertas_empresa = DB::select($sql_ofertas_empresa);
        $condiciones=" 1 = 1 ";
        $bandera=0;
        foreach ($ofertas_empresa as $key) {
            $bandera=0;
            if($key->edad=="15 - 25"){$condiciones=$condiciones." AND TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) BETWEEN 15 AND 25";} 
            if($key->edad=="25 - 35"){$condiciones=$condiciones." AND TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) BETWEEN 25 AND 35";} 
            if($key->edad=="35 - 45"){$condiciones=$condiciones." AND TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) BETWEEN 35 AND 45";} 
            if($key->edad=="Mayor a 45"){$condiciones=$condiciones." AND TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) > 45";} 
            
            if($key->genero='Femenino')
            {
                $condiciones=$condiciones." AND t2.id_sexo=2";
            }
            else
            {
                 $condiciones=$condiciones." AND t2.id_sexo=1";
            } 
                $condiciones=$condiciones." AND t5.provincia = '".$key->provincia."'";
                $condiciones=$condiciones." AND t6.localidad = '".$key->localidad."'";

          $sql_recomendados=
            "
            SELECT  t10.nombre_aleatorio, t1.id,concat(t2.nombres,' ',t2.apellidos) as nombre, t2.id_sexo,TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) AS edad,t5.provincia,t6.localidad, t7.t_experiencias+t8.t_educacion as total,'".$key->titulo."' as  titulo_oferta FROM tbl_usuarios t1
            INNER JOIN tbl_candidato_datos_personales t2 ON t1.id = t2.id_usuario
            INNER JOIN tbl_candidato_info_contacto t3 ON t1.id = t3.id_usuario
            INNER JOIN tbl_candidato_preferencias_laborales t4 ON t1.id = t4.id_usuario 
            INNER JOIN tbl_provincias t5 ON t5.id = t3.id_provincia 
            INNER JOIN tbl_localidades t6 ON t6.id =t3.id_localidad
            INNER JOIN (select id_usuario, count(id) as t_experiencias FROM tbl_candidato_experiencia_laboral GROUP BY id_usuario) t7 ON t7.id_usuario = t1.id
            INNER JOIN (select id_usuario, count(id) as t_educacion FROM tbl_candidatos_educacion GROUP BY id_usuario) t8 ON t8.id_usuario = t1.id
            INNER JOIN tbl_usuarios_foto_perfil t9 ON t9.id_usuario = t1.id
            INNER JOIN tbl_archivos t10 ON t10.id = t9.id_foto
            WHERE ".$condiciones."
            GROUP BY t1.id
            ORDER BY t7.t_experiencias+t8.t_educacion desc

            ";
           
            $datos=DB::select($sql_recomendados); 
            
            foreach ($datos as $key) {
                if($bandera<6)
                {
                    $bandera++;
                    $datos_finales[]=$key;
                }  
            }
           
        }
        return $datos_finales;
    }

}
