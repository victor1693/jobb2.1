<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class con_postulados extends Controller
{
    public function filtrar(Request $request)
    {
    	$data = $request->all();
    	$criterio = "";
    	$criterio_id_publicacion = "";

    	if ($data["sexo"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cdp.id_sexo = $data[sexo]";
    		} else {
    			$criterio .= " AND cdp.id_sexo = $data[sexo]";
    		}
    	}

    	if ($data["experiencia"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cel.id_actividad_empresa=$data[experiencia]";
    		} else {
    			$criterio .= " AND cel.id_actividad_empresa=$data[experiencia]";
    		}
    	}

    	if ($data["salario"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cpl.id_remuneracion_pre = $data[salario]";
    		} else {
    			$criterio .= " AND cpl.id_remuneracion_pre = $data[salario]";
    		}
    	}

    	if ($data["edad"] != "") {
    		$explode = explode(",", $data["edad"]);
    		$edad = [];

    		if ($criterio == "") {

    			if (count($explode) > 1) {
    				$edad[0] = $explode[0];
    				$edad[1] = $explode[1];

    				$criterio .= " WHERE TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) BETWEEN $edad[0] AND $edad[1]";
    			} else {
    				$edad[0] = $explode[0];
    				$criterio .= " WHERE TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) > $edad[0]";
    			}

    		} else {

    			if (count($explode) > 1) {
    				$edad[0] = $explode[0];
    				$edad[1] = $explode[1];

    				$criterio .= " AND TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) BETWEEN $edad[0] AND $edad[1]";
    			} else {
    				$edad[0] = $explode[0];
    				$criterio .= " AND TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) > $edad[0]";
    			}
    		}
    	}

    	if ($data["area"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE ce.id_area_estudio=$data[area]";
    		} else {
    			$criterio .= " AND ce.id_area_estudio=$data[area]";
    		}
    	}

    	if ($data["provincia"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cic.id_provincia=$data[provincia]";
    		} else {
    			$criterio .= " AND cic.id_provincia=$data[provincia]";
    		}
    	}

    	if ($data["idioma"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE ci.id_idioma=$data[idioma]";
    		} else {
    			$criterio .= " AND ci.id_idioma=$data[idioma]";
    		}
    	}

    	if ($data["calificacion"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cc.calificacion=$data[calificacion]";
    		} else {
    			$criterio .= " AND cc.calificacion=$data[calificacion]";
    		}
    	}

    	if ($data["marcador"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cm.id_marcador=$data[marcador]";
    		} else {
    			$criterio .= " AND cm.id_marcador=$data[marcador]";
    		}
    	}

    	if ($criterio != "") {
    		$criterio_id_publicacion = " AND p.id_publicacion=:id_pub";
    	} else {
    		$criterio_id_publicacion = " WHERE p.id_publicacion=:id_pub";
    	}

    	$sql = "
    	SELECT 
		p.id_usuario,
		pb.id AS id_publicacion, 
		p.tmp AS fecha_postulacion,
        IF(p.id_salario_usuario IS NULL,'No definido',CONCAT('$',rs.salario)) AS salario, 
		pb.titulo AS titulo_oferta, 
		CONCAT(cdp.nombres,' ',cdp.apellidos) AS nombre_candidato, 
		TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) AS edad_candidato,
		g.descripcion AS sexo_candidato,
		ce.titulo AS profesion_candidato,
		(
		CASE cc.calificacion
		WHEN 1 THEN '★'
		WHEN 2 THEN '★★'
		WHEN 3 THEN '★★★'
		WHEN 4 THEN '★★★★'
		WHEN 5 THEN '★★★★★'
		END
		) AS calificacion,
		IF(m.nombre IS NULL, 'Normal', m.nombre) AS marcador
		FROM tbl_postulaciones p 
		INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id 
		LEFT JOIN tbl_candidato_datos_personales cdp ON p.id_usuario= cdp.id_usuario
        LEFT JOIN tbl_rango_salarios rs ON p.id_salario_usuario=rs.id
		LEFT JOIN tbl_generos g ON cdp.id_sexo=g.id
		LEFT JOIN tbl_candidatos_educacion ce ON p.id_usuario=ce.id_usuario
		LEFT JOIN tbl_candidato_preferencias_laborales cpl ON p.id_usuario=cpl.id_usuario
		LEFT JOIN tbl_area_estudios ae ON ce.id_area_estudio=ae.id
		LEFT JOIN tbl_candidato_info_contacto cic ON p.id_usuario=cic.id_usuario
		LEFT JOIN tbl_candidato_idioma ci ON p.id_usuario=ci.id_usuario
		LEFT JOIN tbl_candidato_experiencia_laboral cel ON p.id_usuario=cel.id_usuario
		LEFT JOIN tbl_actividades_empresa acte ON cel.id_actividad_empresa=acte.id
		LEFT JOIN tbl_candidato_calificaciones cc ON p.id_usuario=cc.id_usuario
		LEFT JOIN (SELECT id_usuario, id_marcador FROM tbl_candidato_marcadores WHERE id_publicacion=:id_pub) cm ON p.id_usuario=cm.id_usuario
		LEFT JOIN tbl_marcadores m ON cm.id_marcador=m.id
		$criterio
		$criterio_id_publicacion
		GROUP BY p.id_usuario
		ORDER BY fecha_postulacion DESC";

		$postulados = DB::select($sql, ["id_pub" => $data["id_publicacion"]]);

    	echo json_encode([
    		"postulados" => $postulados
    	]);
    }

    public function calificarMarcar(Request $request)
    {
    	$data = $request->all();
    	$id_empresa = session()->get('emp_ide');
    	$status = '';

    	DB::beginTransaction();

    	$sql = "SELECT
    			(SELECT calificacion FROM tbl_candidato_calificaciones WHERE id_usuario=$_POST[id_usuario] AND id_empresa=$id_empresa) AS calificacion,
				(SELECT id_marcador FROM tbl_candidato_marcadores WHERE id_usuario=$_POST[id_usuario] AND id_empresa=$id_empresa AND id_publicacion=$_POST[id_publicacion]) AS marcador";

		$info = DB::select($sql);

    	try {

    		if ($info[0]->calificacion) {

    			if ($data["calificacion"] != "") {
    				DB::update("UPDATE tbl_candidato_calificaciones SET calificacion=$data[calificacion] WHERE id_usuario=$data[id_usuario] AND id_empresa=$id_empresa");
    			}
    			
    		} else {
    			
    			if ($data["calificacion"] != "") {
    				
    				DB::insert("INSERT INTO tbl_candidato_calificaciones(id_usuario,id_empresa,calificacion) VALUES ($data[id_usuario], $id_empresa, $data[calificacion])");
    			}
    		}

    		if ($info[0]->marcador) {

    			if ($data["marcador"] != "") {
    				

    				DB::update("UPDATE tbl_candidato_marcadores SET id_marcador=$data[marcador] WHERE id_usuario=$data[id_usuario] AND id_empresa=$id_empresa AND id_publicacion=$data[id_publicacion]");
    			}
    		} else {
    			if ($data["marcador"] != "") {
    				
    				DB::insert("INSERT INTO tbl_candidato_marcadores(id_usuario,id_empresa,id_publicacion,id_marcador) VALUES ($data[id_usuario], $id_empresa, $data[id_publicacion], $data[marcador])");
    			}
    		}
    		DB::commit();
    		$status = 1;
    	} catch (Exception $e) {
    		DB::rollback();
    		$status = 2;
    	}

    	echo json_encode([
    		"status" => $status
    	]);
    }

    public function getCalificacionMarcador()
    {
    	$id_empresa = session()->get('emp_ide');

    	$sql = "SELECT
    			(SELECT CONCAT(nombres,' ',apellidos) FROM tbl_candidato_datos_personales WHERE id_usuario=$_POST[id_usuario]) AS nombre,
				(SELECT calificacion FROM tbl_candidato_calificaciones WHERE id_usuario=$_POST[id_usuario] AND id_empresa=$id_empresa) AS calificacion,
				(SELECT id_marcador FROM tbl_candidato_marcadores WHERE id_usuario=$_POST[id_usuario] AND id_empresa=$id_empresa AND id_publicacion=$_POST[id_publicacion]) AS marcador";

		$info = DB::select($sql);

		echo json_encode([
			"info" => $info
		]);
    }
}
