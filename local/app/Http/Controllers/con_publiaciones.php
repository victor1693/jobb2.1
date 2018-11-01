<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_publiaciones extends Controller
{

    public function index()
    {
        $vista = View::make("administrator_publicacion_ver");
        $sql   = "SELECT  t1.direccion, t1.id, t2.nombre_aleatorio as imagen,t3.nombre,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,t1.fecha_venc,t1.vistos,t1.tmp  FROM tbl_publicacion t1
            LEFT JOIN tbl_archivos t2 ON t1.id_imagen = t2.id
            LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
            LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
            LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id
            LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
            LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
            LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
            GROUP BY t1.id
            ";

        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;

            return $vista;
        } catch (Exception $e) {

        }
    }

    public function create()
    {
        $vista              = View::make("publicacion_crear");
        $sql                = "SELECT * FROM tbl_areas_sectores ORDER BY nombre asc";
        $sql_areas          = "SELECT * FROM tbl_areas ORDER BY nombre asc";
        $sql_disponibilidad = "SELECT * FROM tbl_disponibilidad";
        $sql_provincia      = "SELECT * FROM tbl_provincias";
        $sql_localidad      = "SELECT * FROM tbl_localidades";
        $sql_salarios       = "SELECT * FROM tbl_rango_salarios";
        $sql_imagen         = "
        SELECT  t1.id,t1.nombre,t2.provincia,t3.localidad,t4.nombre,t1.descripcion,t5.nombre_aleatorio FROM tbl_empresa t1
        INNER JOIN tbl_provincias t2 ON t1.provincia = t2.id
        INNER JOIN tbl_localidades t3 ON t1.localidad = t3.id
        INNER JOIN tbl_actividades_empresa t4 ON t1.sector = t4.id
        LEFT JOIN tbl_archivos t5 ON t1.id_imagen = t5.id"; // Aqui va el id de la empresa

        try {
            $datos          = DB::select($sql);
            $areas          = DB::select($sql_areas);
            $disponibilidad = DB::select($sql_disponibilidad);
            $provincia      = DB::select($sql_provincia);
            $localidad      = DB::select($sql_localidad);
            $salarios       = DB::select($sql_salarios);
            $imagen         = DB::select($sql_imagen);

            $vista->imagen         = $imagen;
            $vista->salarios       = $salarios;
            $vista->provincia      = $provincia;
            $vista->localidad      = $localidad;
            $vista->disponibilidad = $disponibilidad;
            $vista->sectores       = $datos;
            $vista->areas          = $areas;

            return $vista;
        } catch (Exception $e) {

        }

    }

    public function register()
    {
        $fecha      = date('Y-m-j');
        $nuevafecha = strtotime('+2 day', strtotime($fecha));
        $nuevafecha = date('Y-m-j', $nuevafecha);

        $empresa        = $_POST['empresa'];
        $titulo         = $_POST['titulo_publicación'];
        $salario        = $_POST['salario'];
        $sector         = $_POST['sector'];
        $area           = $_POST['area'];
        $disponibilidad = $_POST['disponibilidad'];
        $provincia      = $_POST['provincia'];
        $localidad      = $_POST['localidad'];
        $discapacidad   = $_POST['discapacidad'];
        $descripcion    = $_POST['descripcion'];
        $direccion      = $_POST['direccion'];
        $imagen         = 1;
        if (!$_POST['input_imagen'] == "") {$imagen = $_POST['input_imagen'];}
        $sql = "
        INSERT INTO tbl_publicacion
        VALUES(null," . $imagen . "," . $empresa . ",'" . $titulo . "'," . $sector . "," . $area . "," . $disponibilidad . "," . $provincia . "," . $localidad . ",'" . $discapacidad . "','" . $descripcion . "','" . $direccion . "',1,'" . $nuevafecha . "',0,0,0,null)
        ";

        try {
            DB::insert($sql);
            return Redirect("publiacionescrear");
        } catch (Exception $e) {

        }

    }
    public function vali($id)
    {
        if ($id == "") {
            return 0;
        } else {
            return $id;
        }
    }
}
