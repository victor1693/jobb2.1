<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Input;
use Response;
use Image;

class con_empresa extends Controller
{
    public function login()
    {
        return view('empresa_login');
    }

     
    private function consultaGral($condiciones, $limit, $tamPag)
    {
        
        $consulta_gral = "
        FROM tbl_empresa e 
        LEFT JOIN tbl_provincias p ON e.provincia=p.id 
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON t1.id_usuario = e.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto = a.id  
        LEFT JOIN tbl_actividades_empresa asec ON e.sector=asec.id
        $condiciones GROUP BY e.id LIMIT $limit, $tamPag";

        return $consulta_gral;
    }

    public function index()
    {
        return view('administrator_empresas_ver');
    }

    public function profile()
    {

        $id_empresa = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

        if ($id_empresa) {
            if ($id_empresa == session()->get("emp_ide")) {
                $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
                $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
                $provincias          = DB::select("SELECT * FROM tbl_provincias");

                $localidades = [];

                $datos_emp = DB::select("SELECT e.*, u.correo FROM tbl_empresa e INNER JOIN tbl_usuarios u ON e.id_usuario=u.id WHERE e.id=?", [$id_empresa]);

                if ($datos_emp[0]->provincia != 0) {
                    $localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$datos_emp[0]->provincia]);
                }

                $params = [
                    "actividades" => $actividades_empresa,
                    "paises"      => $paises,
                    "provincias"  => $provincias,
                    "localidades" => $localidades,
                    "empresa"     => $datos_emp,
                ];
                return view('empresa_profile', $params);
            } else {
                return Redirect("empresa/perfil?e=" . session()->get("emp_ide"));
            }
        } else {
            return Redirect("inicio");
        }
    }

    public function registroView()
    {
        return view('empresa_registro_view');
    }

    public function newPost()
    {

        $areas            = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
        $provincias       = DB::select("SELECT * FROM tbl_provincias");
        $planes_estado    = DB::select("SELECT * FROM tbl_planes_estado");
        $disponibilidades = DB::select("SELECT * FROM tbl_disponibilidad");
        $salarios         = DB::select("SELECT * FROM tbl_rango_salarios");
        $plantillas       = DB::select("SELECT * FROM tbl_plantillas_ofertas WHERE id_empresa IS NULL OR id_empresa=?", [session()->get('emp_ide')]);

        $params = [
            "areas"            => $areas,
            "provincias"       => $provincias,
            "planes"           => $planes_estado,
            "disponibilidades" => $disponibilidades,
            "salarios"         => $salarios,
            "plantillas"       => $plantillas
        ];

        return view('empresa_new_post', $params);
    }

    public function editPost($id_post)
    {
    	$sql   = "SELECT *, DATE_FORMAT(fecha_venc, '%d/%m/%Y') AS fecha_exp FROM tbl_publicacion WHERE id=?";
    	$areas            = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
        $provincias       = DB::select("SELECT * FROM tbl_provincias");
        $planes_estado    = DB::select("SELECT * FROM tbl_planes_estado");
        $disponibilidades = DB::select("SELECT * FROM tbl_disponibilidad");
        $salarios         = DB::select("SELECT * FROM tbl_rango_salarios");
        $plantillas       = DB::select("SELECT * FROM tbl_plantillas_ofertas WHERE id_empresa IS NULL OR id_empresa=?", [session()->get('emp_ide')]);
        $localidades 		  = [];
        $sectores 		  = [];

    	$oferta = DB::select($sql, [$id_post]);

    	if ($oferta) {

    		$localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$oferta[0]->id_provincia]);
    		$sectores = DB::select("SELECT * FROM tbl_areas_sectores WHERE id_area=?", [$oferta[0]->id_area]);

    		$params = [
    		    "areas"            => $areas,
    		    "provincias"       => $provincias,
    		    "planes"           => $planes_estado,
    		    "disponibilidades" => $disponibilidades,
    		    "salarios"         => $salarios,
    		    "oferta"		   => $oferta,
    		    "localidades"      => $localidades,
    		    "sectores"         => $sectores,
                "plantillas"       => $plantillas
    		];
    		return view("empresa_edit_post", $params);
    	} else {
    		return redirect("empresa/ofertas");
    	}
    }

    public function ofertas()
    {
        $sql1          = DB::select("SELECT COUNT(*) AS total_ofertas FROM tbl_publicacion WHERE id_empresa=?", [session()->get("emp_ide")]);
        $total_ofertas = $sql1[0]->total_ofertas;
        $sql2 = DB::select("SELECT COUNT(*) AS total_postulados FROM tbl_postulaciones p INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id WHERE pb.id_empresa=?", [session()->get("emp_ide")]);
        $total_postulados = $sql2[0]->total_postulados;
        $total_jobbers = DB::select("SELECT COUNT(*) AS count FROM tbl_usuarios WHERE tipo_usuario=2");

        $ofertas = DB::select("
        		SELECT
				r.*
				FROM
				(
				  SELECT
	              pub.id,
	              pub.titulo,
	              CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
	              CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
	              IF(pub.estatus=1,'Activo','Inactivo') AS estatus,
				  (SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
				  (SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.fecha_venc,
                  pub.estatus AS id_estatus
	              FROM
	              tbl_publicacion pub
	              INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
	              INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
	              WHERE pub.id_empresa=?
				) r
				ORDER BY postulados, ultima_fecha_postulacion DESC", [session()->get("emp_ide")]);

        $plan = DB::select("SELECT tbl_empresas_planes.*, tbl_planes.descripcion AS nombre FROM tbl_empresas_planes INNER JOIN tbl_planes ON tbl_planes.id=tbl_empresas_planes.id_plan WHERE tbl_empresas_planes.id_empresa=?", [session()->get("emp_ide")]);

        if ($ofertas) {
            foreach ($ofertas as $oferta) {
                switch ($plan[0]->id_plan) {
                    case 1:
                        $timestamp_final = strtotime($oferta->fecha_venc);

                        $timestamp_today = strtotime(date('Y-m-d'));

                        if ($timestamp_today >= $timestamp_final) { // ¿Caducó?
                            if ($oferta->id_estatus == 1) { // Si la publicacion caducó pero sigue estando activa, desactivarla.
                                DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?",[$oferta->id]);
                            }
                        } 
                        break;
                    
                    case 2:
                        $timestamp_final = strtotime($oferta->fecha_venc);

                        $timestamp_today = strtotime(date('Y-m-d'));

                        if ($timestamp_today >= $timestamp_final) { // ¿Caducó?
                            if ($oferta->id_estatus == 1) { // Si la publicacion caducó pero sigue estando activa, desactivarla.
                                DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?",[$oferta->id]);
                            }
                        }
                        break;
                }
            }

            $ofertas = DB::select("
                SELECT
                r.*
                FROM
                (
                  SELECT
                  pub.id,
                  pub.titulo,
                  CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
                  CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
                  IF(pub.estatus=1,'Activo','Inactivo') AS estatus,
                  (SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
                  (SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.estatus AS id_estatus,
                  DATEDIFF(NOW(), pub.fecha_venc) AS dias_venc,
                  pub.tmp AS creacion
                  FROM
                  tbl_publicacion pub
                  INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
                  INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
                  WHERE pub.id_empresa=?
                ) r
                ORDER BY creacion", [session()->get("emp_ide")]);
        }

        $params = [
            "total_ofertas" => $total_ofertas,
            "ofertas"       => array_reverse($ofertas),
            "total_postulados" => $total_postulados,
            "total_jobbers" => $total_jobbers[0]->count,
            "fecha_plan"=>$plan[0]->tmp,
        ];
        return view('empresa_ofertas', $params);
    }

    public function planes()
    {
    	$plan = DB::select("SELECT * FROM tbl_planes WHERE id <> 1");
    	$beneficios_planes = DB::select("SELECT pb.alias_gratis, pb.alias_premium, GROUP_CONCAT(id_plan ORDER BY id_plan ASC SEPARATOR ',') AS planes_asignados FROM tbl_planes_beneficios pb INNER JOIN tbl_beneficios_per_plan bpp ON pb.id=bpp.id_beneficio GROUP BY id_beneficio");

    	$params = [
    		"plan" => $plan,
    		"beneficios_planes" => $beneficios_planes
    	];
        return view('empresa_planes', $params);
    }

    public function postulados($id_publicacion)
    {
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
		GROUP_CONCAT(ce.titulo SEPARATOR ', ') AS profesion_candidato,
		(
		CASE cc.calificacion
		WHEN 1 THEN '★'
		WHEN 2 THEN '★★'
		WHEN 3 THEN '★★★'
		WHEN 4 THEN '★★★★'
		WHEN 5 THEN '★★★★★'
		END
		) AS calificacion,
		m.nombre AS marcador
		FROM tbl_postulaciones p 
		INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id 
		LEFT JOIN tbl_candidato_datos_personales cdp ON p.id_usuario= cdp.id_usuario
        LEFT JOIN tbl_rango_salarios rs ON p.id_salario_usuario=rs.id
		LEFT JOIN tbl_generos g ON cdp.id_sexo=g.id
		LEFT JOIN tbl_candidatos_educacion ce ON p.id_usuario=ce.id_usuario
		LEFT JOIN tbl_candidato_calificaciones cc ON p.id_usuario=cc.id_usuario
		LEFT JOIN (SELECT id_usuario, id_marcador FROM tbl_candidato_marcadores WHERE id_publicacion=:id_pub) cm ON p.id_usuario=cm.id_usuario
		LEFT JOIN tbl_marcadores m ON cm.id_marcador=m.id
		WHERE p.id_publicacion=:id_pub
        GROUP BY p.id_usuario
		ORDER BY fecha_postulacion DESC";

		$filtro_experiencia_laboral = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
		$filtro_salario = DB::select("SELECT * FROM tbl_rango_salarios");
		$filtro_provincia = DB::select("SELECT * FROM tbl_provincias");
		$filtro_idioma = DB::select("SELECT * FROM tbl_idiomas");
		$filtro_area_estudios = DB::select("SELECT * FROM tbl_area_estudios ORDER BY descripcion");

    	$oferta_postulado = DB::select($sql, ["id_pub" => $id_publicacion]);

    	if ($oferta_postulado) {
    		$params = [
    			"postulados" => $oferta_postulado,
    			"filtro_experiencia_laboral" => $filtro_experiencia_laboral,
    			"filtro_salario" => $filtro_salario,
    			"filtro_provincia" => $filtro_provincia,
    			"filtro_idioma" => $filtro_idioma,
    			"filtro_area_estudios" => $filtro_area_estudios,
    			"id_publicacion" => $id_publicacion
    		];

        	return view('empresa_postulados', $params);
    	} else {
    		return redirect("empresa/ofertas");
    	}
    }

    public function existEmpresa()
    {
        $response = '';

        $exist = DB::select("SELECT id FROM tbl_usuarios WHERE correo=? AND tipo_usuario=1", [$_REQUEST['email']]);

        if ($exist) {
            $response = 2;
        } else {
            $response = 1;
        }

        echo json_encode([
            "status" => $response,
        ]);
    }

    public function registro()
    {

        $response = '';

        $user               = $_REQUEST['user'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $nombre_responsable = $_REQUEST['nombre_responsable'];
        $nombre_empresa     = $_REQUEST['nombre_empresa'];
        $razon_social       = $_REQUEST['razon_social'];
        $cuit               = $_REQUEST['cuit'];
        $telefono           = $_REQUEST['telefono'];
        $plan               = $_REQUEST['plan'];

        $sql1 = "INSERT INTO tbl_empresa(id_usuario,nombre,responsable,razon_social,cuit,telefono,id_imagen) VALUES(?,?,?,?,?,?,?)";

        $sql2 = "INSERT INTO tbl_empresas_planes(id_empresa,id_plan) VALUES (?,?)";

        $sql3    = "INSERT INTO tbl_usuarios(usuario,correo,clave,tipo_usuario) VALUES(?,?,?,?)";
        $params3 = [$user, $email, md5($password), 1];

        DB::beginTransaction();

        try {

            DB::insert($sql3, $params3); // tbl_usuarios

            $id_usuario = DB::getPdo()->lastInsertId();
            $params1    = [$id_usuario, $nombre_empresa, $nombre_responsable, $razon_social, $cuit, $telefono, 1];

            DB::insert($sql1, $params1); //tbl_empresa

            $id_empresa = DB::getPdo()->lastInsertId();
            $params2    = [$id_empresa, $plan];

            DB::insert($sql2, $params2); //tbl_empresas_planes

            DB::commit();
            $response = 1;

        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);
    }

    public function registerPost()
    {

        $response = '';

        $titulo       = $_REQUEST["titulo"];
        $descripcion  = $_REQUEST["description"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $salario_usuario = $_REQUEST["salario_usuario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"] != 0 ? $_REQUEST["plan"] : null;
        $disp         = $_REQUEST["disp"];
        $discapacidad = $_REQUEST["discapacidad"];
        $confidencial = $_REQUEST["confidencial"];
        $video        = $_REQUEST["video"];

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $descripcion);

        $id_empresa = session()->get("emp_ide");

        $sql    = "INSERT INTO tbl_publicacion(id_imagen,id_empresa,titulo,id_sector,id_area,id_disponibilidad,id_provincia,id_localidad,discapacidad,descripcion,direccion,video_youtube,estatus,fecha_venc,id_salario,salario_usuario,id_plan_estado,confidencial) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $explode = explode('/', $_REQUEST['fecha_exp']);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        $params = [1, $id_empresa, $titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, 1, $fecha_venc, $salario, $salario_usuario, $plan, $confidencial];

        DB::beginTransaction();

        try {
            DB::insert($sql, $params);

            DB::commit();
            $response = 1;
        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);

    }

    public function updatePost()
    {

        $response = '';

        $id_post       = $_REQUEST["id_post"];
        $titulo       = $_REQUEST["titulo"];
        $descripcion  = $_REQUEST["description"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $salario_usuario = $_REQUEST["salario_usuario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"] != 0 ? $_REQUEST["plan"] : null;
        $disp         = $_REQUEST["disp"];
        $discapacidad = $_REQUEST["discapacidad"];
        $confidencial = $_REQUEST["confidencial"];
        $video        = $_REQUEST["video"];

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $descripcion);

        $id_empresa = session()->get("emp_ide");

        $explode = explode('/', $_REQUEST['fecha_exp']);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        $sql = "UPDATE tbl_publicacion SET titulo=?, id_sector=?, id_area=?, id_disponibilidad=?, id_provincia=?, id_localidad=?, discapacidad=?, descripcion=?, direccion=?, video_youtube=?, fecha_venc=?, id_salario=?, salario_usuario=?, id_plan_estado=?, confidencial=?, estatus=1 WHERE id=? AND id_empresa=?";

        $params = [$titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, $fecha_venc, $salario, $salario_usuario, $plan, $confidencial, $id_post, $id_empresa];

        DB::beginTransaction();

        try {
            DB::update($sql, $params);

            DB::commit();
            $response = 1;
        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);

    }

    public function actualizarProfile(Request $request)
    {

        switch ($_REQUEST["op"]) {
            case 1:

                $nombre_empresa  = $_REQUEST["nombre_empresa"];
                $act_emp         = $_REQUEST["act_emp"];
                $nombre_resp     = $_REQUEST["nombre_resp"];
                $correo          = $_REQUEST["correo"];
                $razon_social    = $_REQUEST["razon_social"];
                $cuit            = $_REQUEST["cuit"];
                $telefono        = $_REQUEST["telefono"];
                $pais            = $_REQUEST["pais"];
                $provincia       = $_REQUEST["provincia"];
                $localidad       = $_REQUEST["localidad"];
                $direccion       = $_REQUEST["direccion"];
                $descripcion_emp = $_REQUEST["descripcion_emp"];

                $response = '';

                DB::beginTransaction();

                try {
                    DB::update("UPDATE tbl_empresa SET nombre=?, responsable=?, razon_social=?, cuit=?, telefono=?, descripcion=?, pais=?, provincia=?, localidad=?, sector=?, direccion=? WHERE id=?", [$nombre_empresa, $nombre_resp, $razon_social, $cuit, $telefono, $descripcion_emp, $pais, $provincia, $localidad, $act_emp, $direccion, session()->get('emp_ide')]);

                    DB::update("UPDATE tbl_usuarios SET correo=? WHERE id=?", [$correo, session()->get("emp_id")]);

                    $request->session()->set("empresa", $correo);
                    $request->session()->set("emp_nombre_empresa", $nombre_empresa);

                    DB::commit();
                    $response = 1;

                } catch (Exception $e) {
                    DB::rollback();
                    $response = 2;
                }

                echo json_encode([
                    "status" => $response,
                ]);

                break;

            case 2:

                $web = $_REQUEST["web"];
                $fb  = $_REQUEST["fb"];
                $tw  = $_REQUEST["tw"];
                $ig  = $_REQUEST["ig"];
                $lnd = $_REQUEST["lnd"];

                $response = '';

                DB::beginTransaction();

                try {

                    DB::update("UPDATE tbl_empresa SET web=?, facebook=?, twitter=?, instagram=?, linkedin=? WHERE id=?", [$web, $fb, $tw, $ig, $lnd, session()->get("emp_ide")]);

                    DB::commit();

                    $response = 1;

                } catch (Exception $e) {
                    DB::rollback();
                    $response = 2;
                }

                echo json_encode([
                    "status" => $response,
                ]);
                break;
            case 3:

            	$response = '';

            	DB::beginTransaction();

            	try {

            	    DB::update("UPDATE tbl_empresa SET id_imagen=? WHERE id=?", [$_REQUEST['id_imagen'], session()->get("emp_ide")]);

            	    $data = DB::select("SELECT nombre_aleatorio AS imagen FROM tbl_archivos WHERE id=?",[$_REQUEST['id_imagen']]);

            	    $request->session()->set("emp_imagen", $data[0]->imagen);

            	    DB::commit();

            	    $response = 1;

            	} catch (Exception $e) {
            	    DB::rollback();
            	    $response = 2;
            	}

            	echo json_encode([
            	    "status" => $response,
            	]);

            	break;
            case 4:

            	$response = '';

            	$pass_act = md5($_REQUEST['pass_act']);
            	$pass_new = md5($_REQUEST['pass_new']);

            	$pass_coincide = DB::select("SELECT id FROM tbl_usuarios WHERE clave=? AND id=?",[$pass_act, session()->get("emp_id")]);

            	if ($pass_coincide) {
            		DB::beginTransaction();

            		try {

            		    DB::update("UPDATE tbl_usuarios SET clave=? WHERE id=?", [$pass_new, session()->get("emp_id")]);

            		    DB::commit();

            		    $response = 1;

            		} catch (Exception $e) {
            		    DB::rollback();
            		    $response = 3;
            		}
            	} else {
            		$response = 2;
            	}

            	echo json_encode([
            	    "status" => $response,
            	]);

            	break;
        }
    }

    public function detail()
    {

        $id_empresa = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

        if ($id_empresa) {

            $sql = "SELECT
        a.nombre_aleatorio AS imagen,
        e.nombre AS nombre_empresa,
        e.descripcion,
        e.facebook,
        e.web,
        e.twitter,
        e.instagram,
        e.linkedin,
        CONCAT(p.provincia, ', ', l.localidad) AS provincia_localidad,
        (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=e.id) AS total_ofertas,
        (SELECT MAX(tmp) FROM tbl_publicacion WHERE id_empresa=e.id) AS last_date_oferta,
        ae.nombre AS actividad_empresa,
        (SELECT COUNT(*) FROM tbl_postulaciones p INNER JOIN tbl_publicacion pub ON pub.id=p.id_publicacion WHERE pub.id_empresa=e.id) AS candidatos
        FROM tbl_empresa e
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON e.id_usuario = t1.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto=a.id
        LEFT JOIN tbl_provincias p ON e.provincia=p.id
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_actividades_empresa ae ON e.sector=ae.id
        WHERE e.id=?";

            $datos_emp = DB::select($sql, [$id_empresa]);

            $ofertas = DB::select("SELECT t1.direccion, t1.id, t1.id_empresa, t1.confidencial, t1.id_modalidad_publicacion AS modalidad, t2.nombre_aleatorio as imagen,t3.nombre, t3.web, t3.facebook, t3.twitter, t3.instagram, t3.linkedin, (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=t1.id_empresa) AS q_ofertas,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,DATE_FORMAT(t1.fecha_venc, '%d/%m/%Y') AS fecha_venc,t1.vistos,IF(DATE_FORMAT(t1.tmp, '%Y-%m-%d')=CURDATE(),'Hoy',DATE_FORMAT(t1.tmp, '%d/%m')) AS fecha_pub, DATE_FORMAT(t1.tmp, '%h:%i %p') AS hora_pub,t9.id_plan, REPLACE(LCASE(t11.plan),' ','-') AS plan_estado
              FROM tbl_publicacion t1
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
              WHERE t1.id_empresa=? AND t1.estatus=1", [$id_empresa] ); 
            $params = [
                "empresa" => $datos_emp,
                "ofertas" => $ofertas,
            ];

            return view('empresa_detalle', $params);
        } else {
            return Redirect("inicio");
        }

    }

    public function accionPost($accion, $id_post)
    {
    	switch ($accion) {
    		case 1: // Pausar Publicación
    			
    			DB::beginTransaction();
    			try {
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=1");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=2");
    			}
    			break;
    		
    		case 2: // Habilitar Publicación
    			
    			DB::beginTransaction();
    			try {
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=1 WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=1");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=2");
    			}

    			break;
    		case 3: // Eliminar Publicación

                DB::beginTransaction();
                try {
                    
                    DB::delete("DELETE FROM tbl_publicacion WHERE id=?", [$id_post]);
                    DB::commit();

                    return redirect()->back()->with('alert', 'Se ha eliminado la publicación satisfactoriamente.');
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->back()->with('alert-error', 'Ha ocurrido un error al intentar eliminar la publicación.');
                }

                break;

            case 4: // Renovar Publicación

    			DB::beginTransaction();
    			try {

                    $fecha_venc = '';
                    if (session()->get('emp_plan')[0]->id_plan == 1) {
                        $fecha_venc = strtotime('+15 day', strtotime(date('Y-m-d H:i:s')));
                        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);
                    } else {
                        $fecha_venc = strtotime('+35 day', strtotime(date('Y-m-d H:i:s')));
                        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);
                    }
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=1, tmp=NOW(), fecha_venc='$fecha_venc' WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=5");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=6");
    			}

    			break;
    	}
    }

    public function uploadImage(Request $request)
    {
        $identificador   = "emp_id";
        $file            = Input::file('file');
        $destinationPath = 'uploads';
        $original        = $file->getClientOriginalName();
        $extension       = $file->getClientOriginalExtension();
        $filename        = $identificador . str_random(12) . "." . strtolower($extension);
        
        $tipo_documento = "";

        if ($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png" || $extension == "raw" || $extension == "bmp") {
            $tipo_documento = "Imagen";
        } else if ($extension == "exe") {
            $tipo_documento = "Aplicación";
        } else if ($extension == "sql") {
            $tipo_documento = "Scripts";
        } else if ($extension == "html" || $extension == "php" || $extension == "css" || $extension == "js" || $extension == "jar") {
            $tipo_documento = "Código fuente";
        } else if ($extension == "zip" || $extension == "rar") {
            $tipo_documento = "Comprimido";
        } else {
            $tipo_documento = "Documento";
        }

        $upload_success = Input::file('file')->move($destinationPath, $filename);


        $sql_contador="SELECT count(*) as cantidad FROM `tbl_archivos` WHERE id_usuario=".session()->get('emp_id')."";
        
        try {
            $datos=DB::select($sql_contador);
           
            if($datos[0]->cantidad >= 5)
            {
               return Response::json('Sin espacio', 500);
            }
        } catch (Exception $e) {
            
        } 

        $sql = "INSERT INTO tbl_archivos VALUES (null," . session()->get($identificador) . ",'" . $original . "','" . $extension . "','','" . $filename . "','" . $tipo_documento . "',null)";

        if ($upload_success) {
            try {
                if($tipo_documento=="Imagen")
                {  
                    Image::make("uploads/".$filename)->resize(80, 80)->save("uploads/min/".$filename); 
                    Image::make("uploads/".$filename)->resize(200, 200)->save("uploads/md/".$filename); 
                }
                DB::insert($sql);
                $id_foto = DB::getPdo()->lastInsertId();

                DB::update("UPDATE tbl_usuarios_foto_perfil SET id_foto=? WHERE id_usuario=?", [$id_foto ,session()->get('emp_id')]);

                $request->session()->set('emp_imagen', $filename);

                return Response::json('success', 200);
            } catch (Exception $e) {
            }
        } else {
            return Response::json('error', 400);
        }
    }

    public function plantillas()
    {
        $plantillas = DB::select("SELECT * FROM tbl_plantillas_ofertas WHERE id_empresa=?", [session()->get('emp_ide')]);

        return view('empresa_plantillas', compact('plantillas'));
    }

    public function crearCursos()
    {

        if (session()->get('emp_plan')[0]->id_plan == 1) {
            return redirect()->back();
        }
        
        $areas            = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
        $provincias       = DB::select("SELECT * FROM tbl_provincias");

        $params = [
            "areas"            => $areas,
            "provincias"       => $provincias,
        ];

        return view('empresa_new_curso', $params);
    }

    public function storeCurso(Request $request)
    {
        $this->validate($request,[
            "titulo" => "required",
            "descripcion" => "required",
            "modalidad" => "required",
            "duracion" => "required",
            "area" => "required",
            "sector" => "required",
            "precio" => "required",
            "fecha_exp" => "required",
        ],
        [
            "titulo.required" => "Titulo es un campo obligatorio.",
            "descripcion.required" => "Descripción es un campo obligatorio.",
            "modalidad.required" => "Modalidad es un campo obligatorio.",
            "duracion.required" => "Duración es un campo obligatorio.",
            "area.required" => "Area es un campo obligatorio.",
            "sector.required" => "Sector es un campo obligatorio.",
            "precio.required" => "Precio es un campo obligatorio.",
            "fecha_exp.required" => "Fecha de expiración es un campo obligatorio.",
        ]);

        if ($request->modalidad == 2) {
            if ($request->provincia == "" || $request->localidad == "") {
                return redirect()->back()->withErrors(['Has dejado campos obligatorios vacíos.']);
            }
        }

        DB::beginTransaction();

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $request->descripcion);
        $explode = explode('/', $request->fecha_exp);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        try {
            $data = [];
            $data['id_empresa'] = session()->get('emp_ide');
            $data['titulo'] = $request->titulo;
            $data['id_sector'] = $request->sector;
            $data['id_area'] = $request->area;
            if ($request->modalidad == 2) {
                $data['id_provincia'] = $request->provincia;
                $data['id_localidad'] = $request->localidad;
            }
            $data['descripcion'] = $descripcion;
            $data['estatus'] = 0;
            $data['fecha_venc'] = $fecha_venc;
            $data['id_modalidad_publicacion'] = 2;

            DB::table('tbl_publicacion')->insert($data);
            $id_publicacion = DB::getPdo()->lastInsertId();

            $data = [];
            $data['id_publicacion'] = $id_publicacion;
            $data['id_modalidad_curso'] = $request->modalidad;
            $data['duracion'] = $request->duracion;
            $data['id_modalidad_duracion'] = $request->modalidad_duracion;
            $data['precio'] = $request->precio;

            DB::table('tbl_cursos')->insert($data);

            DB::commit();

            return redirect('empresa/cursos?r=1');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Vuelva a intentarlo por favor.']);
        }
    }

    public function cursos()
    {

        if (session()->get('emp_plan')[0]->id_plan == 1) {
            return redirect()->back();
        }

        $sql1          = DB::select("SELECT COUNT(*) AS total_cursos FROM tbl_publicacion WHERE id_empresa=? AND id_modalidad_publicacion=2", [session()->get("emp_ide")]);
        $total_cursos = $sql1[0]->total_cursos;
        // $sql2 = DB::select("SELECT COUNT(*) AS total_postulados FROM tbl_postulaciones p INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id WHERE pb.id_empresa=?", [session()->get("emp_ide")]);
        // $total_postulados = $sql2[0]->total_postulados;

        $total_jobbers = DB::select("SELECT COUNT(*) AS count FROM tbl_usuarios WHERE tipo_usuario=2");

        $cursos = DB::select("
                SELECT 
                r.*
                FROM
                (
                  SELECT
                  pub.id,
                  pub.titulo,
                  CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
                  CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
                  IF(pub.estatus=1,'Aprobado','Pendiente') AS estatus,
                  #(SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
                  #(SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.fecha_venc,
                  pub.estatus AS id_estatus,
                  mc.id AS id_mc,
                  md.id AS id_md,
                  mc.modalidad AS modalidad_curso,
                  CONCAT(c.duracion,' ',md.modalidad) AS duracion,
                  CONCAT('$',c.precio) AS precio_curso
                  FROM
                  tbl_publicacion pub
                  LEFT JOIN tbl_cursos c ON pub.id=c.id_publicacion
                  LEFT JOIN tbl_modalidades_curso mc ON c.id_modalidad_curso=mc.id
                  LEFT JOIN tbl_modalidades_duracion md ON c.id_modalidad_duracion=md.id
                  LEFT JOIN tbl_provincias prov ON pub.id_provincia=prov.id
                  LEFT JOIN tbl_localidades l ON pub.id_localidad=l.id
                  WHERE pub.id_empresa=? AND pub.id_modalidad_publicacion=2
                ) r", [session()->get("emp_ide")]);

        $plan = DB::select("SELECT tbl_empresas_planes.*, tbl_planes.descripcion AS nombre FROM tbl_empresas_planes INNER JOIN tbl_planes ON tbl_planes.id=tbl_empresas_planes.id_plan WHERE tbl_empresas_planes.id_empresa=?", [session()->get("emp_ide")]);

        if ($cursos) {
            foreach ($cursos as $curso) {
                switch ($plan[0]->id_plan) {
                    
                    case 2:
                        $timestamp_final = strtotime($curso->fecha_venc);

                        $timestamp_today = strtotime(date('Y-m-d'));

                        if ($timestamp_today >= $timestamp_final) { // ¿Caducó?
                            if ($curso->id_estatus == 1) { // Si la publicacion caducó pero sigue estando activa, desactivarla.
                                DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?",[$curso->id]);
                            }
                        }
                        break;
                }
            }

            $cursos = DB::select("
                SELECT 
                r.*
                FROM
                (
                  SELECT
                  pub.id,
                  pub.titulo,
                  CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
                  CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
                  IF(pub.estatus=1,'Aprobado','Pendiente') AS estatus,
                  #(SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
                  #(SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.fecha_venc,
                  pub.estatus AS id_estatus,
                  mc.id AS id_mc,
                  md.id AS id_md,
                  mc.modalidad AS modalidad_curso,
                  CONCAT(c.duracion,' ',md.modalidad) AS duracion,
                  CONCAT('$',c.precio) AS precio,
                  DATEDIFF(NOW(), pub.fecha_venc) AS dias_venc
                  FROM
                  tbl_publicacion pub
                  LEFT JOIN tbl_cursos c ON pub.id=c.id_publicacion
                  LEFT JOIN tbl_modalidades_curso mc ON c.id_modalidad_curso=mc.id
                  LEFT JOIN tbl_modalidades_duracion md ON c.id_modalidad_duracion=md.id
                  LEFT JOIN tbl_provincias prov ON pub.id_provincia=prov.id
                  LEFT JOIN tbl_localidades l ON pub.id_localidad=l.id
                  WHERE pub.id_empresa=? AND pub.id_modalidad_publicacion=2
                ) r", [session()->get("emp_ide")]);
        }

        $params = [
            "total_cursos" => $total_cursos,
            "cursos"       => array_reverse($cursos),
            // "total_postulados" => $total_postulados,
            "total_jobbers" => $total_jobbers[0]->count
        ];
        return view('empresa_cursos', $params);
    }

    public function editCurso($id)
    {
        $curso = DB::table('tbl_publicacion AS p')
                    ->select(
                        'p.id AS id_publicacion',
                        'titulo',
                        'descripcion',
                        'id_modalidad_curso',
                        'duracion',
                        'id_modalidad_duracion',
                        'id_area',
                        'id_sector',
                        'precio',
                        'fecha_venc',
                        'id_provincia',
                        'id_localidad'
                    )
                    ->leftjoin('tbl_cursos AS c', 'p.id', '=', 'c.id_publicacion')
                    ->where('id_empresa', session()->get('emp_ide'))
                    ->where('id_modalidad_publicacion', 2)
                    ->where('p.id',$id)
                    ->first();

        if (!$curso) {
            return redirect()->back();
        }

        $areas = DB::table('tbl_areas')->get();

        $sectores = DB::table('tbl_areas_sectores')
                    ->select('id','nombre')
                    ->where('id_area',$curso->id_area)
                    ->get();

        $provincias = DB::table('tbl_provincias')->get();


        $localidades = [];

        if ($curso->id_provincia != null) {
            $localidades = DB::table('tbl_localidades')
                            ->select('id','localidad')
                            ->where('id_provincia',$curso->id_provincia)
                            ->get();
        }

        return view('empresa_edit_curso', compact('curso', 'areas', 'sectores', 'provincias', 'localidades'));
    }

    public function editStoreCurso(Request $request)
    {
        $this->validate($request,[
            "titulo" => "required",
            "descripcion" => "required",
            "modalidad" => "required",
            "duracion" => "required",
            "area" => "required",
            "sector" => "required",
            "precio" => "required",
            "fecha_exp" => "required",
        ],
        [
            "titulo.required" => "Titulo es un campo obligatorio.",
            "descripcion.required" => "Descripción es un campo obligatorio.",
            "modalidad.required" => "Modalidad es un campo obligatorio.",
            "duracion.required" => "Duración es un campo obligatorio.",
            "area.required" => "Area es un campo obligatorio.",
            "sector.required" => "Sector es un campo obligatorio.",
            "precio.required" => "Precio es un campo obligatorio.",
            "fecha_exp.required" => "Fecha de expiración es un campo obligatorio.",
        ]);

        if ($request->modalidad == 2) {
            if ($request->provincia == "" || $request->localidad == "") {
                return redirect()->back()->withErrors(['Has dejado campos obligatorios vacíos.']);
            }
        }

        DB::beginTransaction();

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $request->descripcion);
        $explode = explode('/', $request->fecha_exp);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        try {
            $data = [];
            $data['titulo'] = $request->titulo;
            $data['id_sector'] = $request->sector;
            $data['id_area'] = $request->area;
            if ($request->modalidad == 2) {
                $data['id_provincia'] = $request->provincia;
                $data['id_localidad'] = $request->localidad;
            }
            $data['descripcion'] = $descripcion;
            $data['fecha_venc'] = $fecha_venc;

            DB::table('tbl_publicacion')->where('id', $request->id_publicacion)->update($data);

            $data = [];
            $data['id_modalidad_curso'] = $request->modalidad;
            $data['duracion'] = $request->duracion;
            $data['id_modalidad_duracion'] = $request->modalidad_duracion;
            $data['precio'] = $request->precio;

            DB::table('tbl_cursos')->where('id_publicacion', $request->id_publicacion)->update($data);

            DB::commit();

            return redirect('empresa/cursos?r=2');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Vuelva a intentarlo por favor.']);
        }
    }

    public function detalle_curso($id)
    {
        DB::update("UPDATE tbl_publicacion SET vistos=(vistos + 1) WHERE id=?",[$id]);

        $vista = View::make('detalle_curso');
        $sql   = "
        SELECT t2.id as id_empresa, 
        t1.tmp,
        t1.id, 
        t1.titulo,
        t1.vistos,
        t1.descripcion,
        t1.fecha_venc,
        t1.direccion,
        t1.estatus,
        t1.confidencial,
        t9.nombre,
        t7.nombre as sector,
        t8.nombre as area,
        t2.nombre as empresa,
        IF(t6.nombre_aleatorio is null,
        'empresa.jpg',
        t6.nombre_aleatorio) as imagen,
        CONCAT(t11.duracion,' ',t13.modalidad) AS duracion,
        CONCAT('$',FORMAT(t11.precio,2)) AS precio,
        t12.modalidad AS modalidad_curso,
        concat(t3.provincia,' / ',t4.localidad) as dir_empresa FROM tbl_publicacion t1
        LEFT JOIN tbl_cursos t11 ON t1.id=t11.id_publicacion
        LEFT JOIN tbl_modalidades_curso t12 ON t11.id_modalidad_curso=t12.id
        LEFT JOIN tbl_modalidades_duracion t13 ON t11.id_modalidad_duracion=t13.id
        LEFT JOIN tbl_empresa t2 ON t2.id = t1.id_empresa
        LEFT JOIN tbl_provincias t3 ON t3.id = t2.provincia
        LEFT JOIN tbl_localidades t4 ON t4.id = t2.localidad
        LEFT JOIN tbl_usuarios_foto_perfil t5 ON t5.id_usuario = t2.id_usuario
        LEFT JOIN tbl_archivos t6 ON t6.id = t5.id_foto
        LEFT JOIN tbl_areas_sectores t7 ON t7.id = t1.id_sector
        LEFT JOIN tbl_areas t8 ON t8.id = t1.id_area
        LEFT JOIN tbl_disponibilidad t9 ON t9.id = t1.id_disponibilidad
        LEFT JOIN tbl_rango_salarios t10 ON t1.id_salario=t10.id
        WHERE t1.id = " . $id . " /*AND t1.estatus = 1 */AND t1.id_modalidad_publicacion=2";

        try {
            $datos                = DB::select($sql);
            $vista->datos         = $datos;
            $vista->provincias    = DB::table('tbl_provincias')->get();
            $sql_cantidad_cursos = "
                SELECT count(*) as cantidad
                FROM tbl_publicacion
                WHERE id_empresa= " . $datos[0]->id_empresa . " and estatus = 1 AND id_modalidad_publicacion=2 GROUP by id_empresa";

            // $cantidad_postulados = DB::select("SELECT COUNT(*) AS count FROM tbl_postulaciones WHERE id_publicacion=?", [$id]);
            // $vista->cantidad_postulados = $cantidad_postulados[0]->count;
            $cantidad_cursos        = DB::select($sql_cantidad_cursos);
            $vista->cantidad_cursos = $cantidad_cursos;
            // $vista->nivel_user=$this->nivel_usuario();
            // $vista->postulado = $postulado;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function request_info_curso(Request $request)
    {
        $this->validate($request,[
            "nombres" => "required|alpha",
            "apellidos" => "required|alpha",
            "correo" => "required|email|unique:tbl_solicitudes_informacion_cursos",
            "celular" => "required",
            "provincia" => "required",
            "localidad" => "required",
        ],
        [
           "nombres.required" => "El nombre es un campo obligatorio.",
           "nombres.alpha" => "El nombre no es valido.", 
           "apellidos.required" => "El apellido es un campo obligatorio.",
           "apellidos.alpha" => "El apellido no es valido.",
           "correo.required" => "El correo es un campo obligatorio.",
           "correo.email" => "El correo no es valido.",
           "correo.unique" => "Ya existe una solicitud con ese email.",
           "celular.required" => "El celular es un campo obligatorio.",
           "provincia.required" => "La provincia es un campo obligatorio.",
           "localidad.required" => "La localidad es un campo obligatorio.",
        ]);

        DB::beginTransaction();
        
        try {
            $data = [];
            $data['id_publicacion'] = $request->id_pub;
            $data['nombres'] = $request->nombres;
            $data['apellidos'] = $request->apellidos;
            $data['correo'] = $request->correo;
            $data['telefono'] = $request->celular;
            $data['id_provincia'] = $request->provincia;
            $data['id_localidad'] = $request->localidad;

            DB::table('tbl_solicitudes_informacion_cursos')->insert($data);
            DB::commit();
            return redirect('detalle_curso/'.$request->id_pub.'?r=1');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Por favor vuelva a intentarlo']);
        }
    }
}
