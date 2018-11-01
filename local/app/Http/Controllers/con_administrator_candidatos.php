<?php

namespace App\Http\Controllers;

use View;
use DB;
use Mail;
class con_administrator_candidatos extends Controller
{
    public function index()
    {
        $vista=View::make('administrator_candidatos');
        $sql_candidatos=""; 
        if(isset($_GET['filtrar']) && $_GET['filtrar']!="")
        {  
             $sql_candidatos="SELECT t3.correo,t1.id_estatus,concat(t2.nombres,' ',t2.apellidos) as nombre,t1.tmp,t1.id FROM tbl_usuarios t1
            LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario =t1.id
            LEFT JOIN tbl_candidato_info_contacto t3 ON t3.id_usuario =t1.id
            WHERE tipo_usuario = 2 and (concat(t2.nombres,' ',t2.apellidos,' ',t3.correo) like '%".$_GET['filtrar']."%') 
            LIMIT 0,100";
        }
        else
        {
             $sql_candidatos="SELECT t3.correo,t1.id_estatus,concat(t2.nombres,' ',t2.apellidos) as nombre,t1.tmp,t1.id FROM tbl_usuarios t1
            LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario =t1.id
             LEFT JOIN tbl_candidato_info_contacto t3 ON t3.id_usuario =t1.id
            WHERE tipo_usuario = 2
            LIMIT 0,100";
        } 
        $sql_resumen="
        SELECT count(t1.id) as cantidad,t2.id_sexo 
        FROM tbl_usuarios t1
        LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
        WHERE t1.tipo_usuario = 2
        GROUP BY t2.id_sexo 
        ORDER BY t2.id_sexo ASC";
        try {
            $datos_resumen=DB::select($sql_resumen);
            $vista->
datos_resumen=$datos_resumen;

            $datos_candidatos=DB::select($sql_candidatos);
            $vista->datos_candidatos=$datos_candidatos;

            return $vista;
        } catch (Exception $e) {
            
        }
        return view('administrator_candidatos');
    }

     public function editar($id)
    {
        $vista=View::make("administrator_candidatos_editar");
        session()->set('cand_id',$id);
        $sql        = "SELECT correo FROM tbl_usuarios WHERE id = ".session()->get('cand_id')."";
        $sql_imagen = "SELECT * FROM tbl_archivos WHERE id_usuario = " . session()->get("cand_id") . ""; 
        $sql_identificaion="SELECT * FROM tbl_tipo_indentificacion";
        $sql_edo_civil="SELECT * FROM tbl_estados_civiles";
        $sql_paises="SELECT * FROM tbl_paises ORDER BY nacionalidad asc";
        $sql_pronvincias="SELECT * FROM tbl_provincias";
        $sql_localidades="SELECT * FROM tbl_localidades";
        $sql_generos="SELECT * FROM tbl_generos";
        $sql_discapacidad="SELECT * FROM tbl_discapacidad"; 
        $sql_salarios="SELECT * FROM tbl_rango_salarios";
        $sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
        $sql_niveles="SELECT * FROM tbl_nivel_estudio";
        $sql_area_estudios="SELECT * FROM tbl_areas_estudio";
        $sql_area_sector="SELECT * FROM  tbl_actividades_empresa"; 
        $sql_cargos="SELECT * FROM tbl_cargos";
        $sql_habilidades="SELECT * FROM tbl_habilidades";  
        $sql_idiomas="SELECT * FROM tbl_idiomas";        
        $sql_cargos_listado="SELECT t1.*,t2.descripcion FROM tbl_candidatos_cargos t1
        LEFT JOIN tbl_cargos t2 ON t1.id_cargo = t2.id
        WHERE t1.id_usuario=" . session()->get("cand_id") . "";
        $sql_pic = "SELECT count(t1.id) as cantidad,t2.nombre_aleatorio FROM tbl_usuarios_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto WHERE t1.id_usuario=" . session()->get("cand_id") . ""; 
        $sql_redes   = "SELECT *  FROM tbl_redes WHERE id_usuario=" . session()->get("cand_id") . "
        AND tipo_usuario=2";
        $sql_educacion="SELECT t1.id_area_estudio,t1.id_nivel_estudio,t1.id_pais, t1.id,t1.id_usuario, t1.titulo,t1.nombre_institucion,t1.desde,t1.hasta,t1.tmp,t2.descripcion as nivel,t3.nombre as estudios,t4.descripcion FROM tbl_candidatos_educacion t1
            LEFT JOIN tbl_nivel_estudio t2 ON t1.id_nivel_estudio = t2.id
            LEFT JOIN tbl_areas_estudio t3 ON t1.id_area_estudio = t3.id
            LEFT JOIN tbl_paises t4 ON t1.id_pais = t4.id
            WHERE t1.id_usuario=".session()->get("cand_id")."";
        $sql_experiencias="SELECT t1.*,t2.nombre as sector FROM `tbl_candidato_experiencia_laboral` t1
        LEFT JOIN tbl_actividades_empresa t2 ON t1.id_actividad_empresa = t2.id
        WHERE t1.id_usuario=".session()->get("cand_id")."";
        
        $sql_habilidades_listado="SELECT t1.*,t2.descripcion FROM tbl_candidato_habilidades t1
        LEFT JOIN tbl_habilidades t2 ON t1.id_habilidad = t2.id 
        WHERE t1.id_usuario=".session()->get("cand_id")."";
        
         $sql_idiomas_listado="SELECT t1.*,t2.descripcion FROM tbl_candidato_idioma t1
        LEFT JOIN tbl_idiomas t2 ON t1.id_idioma = t2.id 
        WHERE t1.id_usuario=".session()->get("cand_id")."";

        $idiomas_listado        = DB::select($sql_idiomas_listado);
        $idiomas        = DB::select($sql_idiomas);
        $educacion        = DB::select($sql_educacion);
        $habilidades_listado        = DB::select($sql_habilidades_listado);
        $area_sectores        = DB::select($sql_area_sector);
        $experiencias        = DB::select($sql_experiencias);
        $habilidades        = DB::select($sql_habilidades);
        $vista->habilidades = $habilidades; 
        $vista->experiencias = $experiencias; 
        $vista->educacion = $educacion; 
        $vista->area_sectores = $area_sectores;
        $vista->habilidades_listado = $habilidades_listado;
        $redes        = DB::select($sql_redes);
        $vista->redes = $redes; 
         $vista->idiomas_listado = $idiomas_listado; 
        $vista->idiomas = $idiomas; 
        $bandera_datos_contacto=0;
        $sql_contactos="
        SELECT *, count(*) as cantidad FROM tbl_candidato_info_contacto WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_contactos);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_datos_contacto=1;
                $vista->bandera_datos_contacto=$bandera_datos_contacto;
                $vista->infocontacto=$datos;
            }
            else
            {

                $bandera_datos_contacto=0;
                $vista->bandera_datos_contacto=  $bandera_datos_contacto;
            }
        } catch (Exception $e) {
            
        }


        $bandera_datos_personales=0;
        $sql_datos_personales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_datos_personales WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_datos_personales);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_datos_personales=1;
                $vista->bandera_datos_personales=$bandera_datos_personales;
                $vista->datos_personales_up=$datos;
            }
            else
            {
                $bandera_datos_personales=0;
                $vista->bandera_datos_personales=  $bandera_datos_personales;
            }
        } catch (Exception $e) {
            
        }

        $bandera_preferencias_laborales=0;
        $sql_preferencias_laborales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_preferencias_laborales);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_preferencias_laborales=1;
                $vista->bandera_preferencias_laborales=$bandera_preferencias_laborales;
                $vista->preferencias_laborales_up=$datos;
            }
            else
            {
                $bandera_preferencias_laborales=0;
                $vista->bandera_preferencias_laborales=  $bandera_preferencias_laborales;
            }
        } catch (Exception $e) {
            
        } 
        $con_imagen = 0;
        try {
            $datos         = DB::select($sql);
            $imagen        = DB::select($sql_imagen);
            $pic           = DB::select($sql_pic);
            $identificacion= DB::select($sql_identificaion);
            $edo= DB::select($sql_edo_civil);
            $paises= DB::select($sql_paises);
            $provincias= DB::select($sql_pronvincias);
            $localidades= DB::select($sql_localidades);
            $discapacidad= DB::select($sql_discapacidad);
            $infocontacto= DB::select($sql_contactos);
            $generos= DB::select($sql_generos); 
            $salarios= DB::select($sql_salarios);
            $disponibilidad= DB::select($sql_disponibilidad);
            $cargos= DB::select($sql_cargos);
            $cargos_lista= DB::select($sql_cargos_listado);
            $area_estudios= DB::select($sql_area_estudios);
            $nivel_estudio= DB::select($sql_niveles);

            $vista->datos  = $datos;
            $vista->imagen = $imagen; 
            $vista->salarios = $salarios;
            $vista->disponibilidad = $disponibilidad;
            $vista->cargos = $cargos;  

            if ($pic[0]->cantidad == 1) {
                $con_imagen = 1;
            }
            $vista->con_imagen = $con_imagen;
            $vista->pic        = $pic;
            $vista->identificacion= $identificacion;
            $vista->edo= $edo;
            $vista->paises= $paises;
            $vista->localidades= $localidades;
            $vista->provincias= $provincias; 
            $vista->discapacidad= $discapacidad;
            $vista->generos= $generos;  
            $vista->cargos_lista= $cargos_lista;
            $vista->nivel_estudio= $nivel_estudio;  
            $vista->area_estudio= $area_estudios;
            return $vista;
        } catch (Exception $e) {

        }
        
    }

     public function nuevo()
    {
        return view('administrator_candidatos_nuevo');
    }

     public function resumen($id)
    {
        
        $vista=View::make('administrator_candidatos_resumen');
        if(isset($id) && $id !="")
        {
            $sql_recomendaciones="SELECT count(id) as cantidad FROM tbl_recomendaciones WHERE id_usuario=".$id."";
            $sql_postulaciones="SELECT count(id) as cantidad FROM tbl_postulaciones WHERE id_usuario=".$id."";
            $sql_candidato="SELECT t1.id,concat(t2.nombres,' ',t2.apellidos) as nombre,t2.tmp FROM tbl_usuarios t1
            LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
            WHERE t1.id=".$id."";
            
            $sql_datos_personales="SELECT * FROM tbl_candidato_datos_personales WHERE id_usuario=".$id."";
            $sql_datos_educacion="SELECT * FROM tbl_candidatos_educacion WHERE id_usuario=".$id."";
            $sql_experiencia_lab="SELECT * FROM tbl_candidato_experiencia_laboral WHERE id_usuario=".$id."";
            $sql_contacto="SELECT * FROM tbl_candidato_info_contacto WHERE id_usuario=".$id."";
            $sql_preferencias="SELECT * FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".$id."";
            $sql_user="SELECT correo FROM tbl_usuarios WHERE id=".$id."";
            try {

                //Consultas para el % de carga
                //
                $datos_datos_personales=DB::select($sql_datos_personales);
                $datos_datos_educacion=DB::select($sql_datos_educacion); 
                $datos_experiencia_lab=DB::select($sql_experiencia_lab);
                $datos_contacto=DB::select($sql_contacto);
                $datos_preferencias=DB::select($sql_preferencias);


                $datos_recomendaciones=DB::select($sql_recomendaciones);
                $datos_postulaciones=DB::select($sql_postulaciones);
                $datos_candidato=DB::select($sql_candidato);
                $datos_user=DB::select($sql_user);

                $vista->datos_postulaciones=$datos_postulaciones[0]->cantidad;
                $vista->datos_recomendaciones=$datos_recomendaciones[0]->cantidad;
                $vista->datos_candidato=$datos_candidato;
                $vista->datos_datos_personales=$datos_datos_personales;
                $vista->datos_datos_educacion=$datos_datos_educacion;

                $vista->datos_experiencia_lab=$datos_experiencia_lab;
                $vista->datos_contacto=$datos_contacto;
                $vista->datos_preferencias=$datos_preferencias;
                $vista->datos_user=$datos_user;
                return $vista;
            } catch (Exception $e) {
                
            }

        }
        else
        {

        }
    }

     public function recomendaciones()
    {
        return view('administrator_candidatos_recomendaciones');
    }

     public function postulaciones()
    {
        return view('administrator_candidatos_GETulaciones');
    }

    public function agregar_nuevo()
    {
        if(isset($_POST['correo']) && isset($_POST['clave']) && $_POST['clave']!="" && $_POST['correo']!="")
        {

            $sql="INSERT INTO tbl_usuarios VALUES
            (null, '".$_POST['correo']."','','".md5($_POST['clave'])."',2,'".$this->token(40)."',1,'".$this->token(40)."',null)";
            try {
                $sql_datos="SELECT count(id) as cantidad, id FROM tbl_usuarios WHERE correo='".$_POST['correo']."';";
                $datos=DB::select($sql_datos); 
                if($datos[0]->cantidad>0)
                {
                    return Redirect('administracion/candidatos/nuevo?result=Ya este correo se encuentra registrado.&correo;='.$_POST['correo'].'&calve;='.$_POST['clave']); 
                }
                else
                {
                        DB::insert($sql);   
                        $sql_datos="SELECT id FROM tbl_usuarios WHERE correo='".$_POST['correo']."';";
                        $datos=DB::select($sql_datos); 
                        return Redirect('administracion/candidatos/nuevo?result=perfectoid='.$datos[0]->id);
                }
               
            } catch (Exception $e) {
                
            }
        }
        else
        {
            return Redirect('administracion/candidatos/nuevo?result=Ambos campos son obligatorios.');
        }
    }

    public function eliminar_candidato()
    {

        if(isset($_GET['id']) && $_GET['id']!="")
        {
            $sql="SELECT count(correo) as cantidad, correo FROM tbl_usuarios WHERE id=".$_GET['id']."";
            $datos=DB::select($sql);
            if($datos[0]->cantidad>0)
            {
               $sql="
               UPDATE tbl_usuarios 
               SET id_estatus=0, 
               correo = '".$datos[0]->correo."-delete' WHERE id =".$_GET['id']."";
                try {
                    DB::update($sql);
                    return Redirect('administracion/candidatos?result=candidato eliminado.');
                } catch (Exception $e) {
                    
                } 
            }
            else
            {
                return Redirect('administracion/candidatos?result=Usuario no registrado');
            }      
        }
        else
        {
             return Redirect('administracion/candidatos?result=Favor seleccione un candidato para eliminar');
        }
        
        
    }

    public function enviar_correo()
    {
         
        $data = ['detalle' => $_POST['detalle'],];
         $resultado=Mail::send("email.contacto", $data, function ($message) {
                            $message->to($_POST['identificador']);
                            $message->from("no-reply@jobbers.com");
                            $message->subject("no-reply@jobbers.com");
         });
         if($resultado)
         {
            return Redirect('administracion/candidatos?result=Correo enviado con éxito.');
         }
         else
         {
            return Redirect('administracion/candidatos?result=El co.');
         }
        
    }
    public function token($length = 10) 
    { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 
}
