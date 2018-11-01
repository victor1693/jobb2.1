<?php

namespace App\Http\Controllers;

use DB;
use View;
use Illuminate\Http\Request;

class con_administrator_empresas extends Controller
{
    public function index()
    {

        $condicion = "";
        $params_cond = [];

        if (isset($_GET['buscador']) && $_GET['buscador'] != "") {
            $condicion .= " AND e.nombre LIKE ? OR e.razon_social LIKE ? OR u.correo=?";
            $params_cond = [
                $_GET['buscador'].'%',
                $_GET['buscador'].'%',
                $_GET['buscador']
            ];
        }

        $sql = " 
        SELECT
        u.id AS id_usuario,
        e.id AS id_empresa,
        IF(e.nombre IS NULL OR e.nombre='', 'Sin nombre', e.nombre) AS nombre_empresa,
        IF(e.provincia=0,'Sin ubicación',CONCAT(l.localidad,', ',pv.provincia)) AS ubicacion,
        DATE_FORMAT(e.tmp, '%d/%m/%Y') AS fecha_registro,
        p.descripcion AS plan,
        u.correo,
        e.estatus
        FROM tbl_usuarios u
        INNER JOIN tbl_empresa e ON u.id=e.id_usuario
        INNER JOIN tbl_empresas_planes ep ON e.id=ep.id_empresa
        INNER JOIN tbl_planes p ON ep.id_plan=p.id
        LEFT JOIN tbl_provincias pv ON e.provincia=pv.id
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        WHERE u.tipo_usuario=1 $condicion ORDER BY id_empresa DESC;
        ";

        $empresas = DB::select($sql, $params_cond);

        $total_empresas = count($empresas);

        $params = [
            "empresas" => $empresas,
            "total_empresas" => $total_empresas
        ];

        return view('administrator_empresas', $params);
    }

    public function create()
    {

        $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
        $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
        $provincias          = DB::select("SELECT * FROM tbl_provincias");

        $params = [
            "actividades" => $actividades_empresa,
            "paises"      => $paises,
            "provincias"  => $provincias,
        ];

        return view('administrator_empresa_create', $params);
    }

    public function register(Request $request)
    {
        $correo = $request->correo;
        $pass = md5($request->pass);
        $nombre_empresa = $request->nombre_empresa;
        $actividad = $request->act_emp;
        $responsable = $request->nombre_resp;
        $razon_social = $request->razon_social;
        $cuit = $request->cuit;
        $telefono = $request->telefono;
        $pais = $request->pais;
        $provincia = $request->provincia;
        $localidad = $request->localidad;
        $direccion = $request->direccion;
        $descripcion = $request->descripcion_emp;

        $exist = DB::select("SELECT * FROM tbl_usuarios WHERE correo=?", [$correo]);

        if (!$exist) {
            DB::beginTransaction();

            try {
                
                DB::insert("INSERT INTO tbl_usuarios VALUES (null,?,'',?,1,?,1,'',null)", [$correo, $pass, $this->aleatorio(45)]);
                $id_usuario = DB::getPdo()->lastInsertId();
                DB::insert("INSERT INTO tbl_empresa VALUES (null,?,?,?,?,?,?,?,?,?,?,?,1,?,null,null,null,null,null,null,1)", [$id_usuario, $nombre_empresa, $responsable, $razon_social, $cuit, $telefono, $descripcion, $pais, $provincia, $localidad, $actividad, $direccion]);
                $id_empresa = DB::getPdo()->lastInsertId();

                DB::insert("INSERT INTO tbl_empresas_planes VALUES (null,?,1,null)", [$id_empresa]);

                DB::commit();

                return redirect('administracion/empresas?r=1');

            } catch (Exception $e) {
                DB::rollback();
                return redirect('administracion/empresas/create?r=2');

            }
        } else {
            return redirect('administracion/empresas/create?r=3');
        }
    }

    public function suspender_habilitar($accion, $id)
    {
        $exist = DB::select("SELECT id FROM tbl_empresa WHERE id=?", [$id]);

        if ($exist) {
            DB::update("UPDATE tbl_empresa SET estatus=? WHERE id=?", [$accion, $id]);
            return redirect("administracion/empresas");
        } else {
            return redirect("administracion/empresas");
        }
        
    }

    private function aleatorio($length)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function edit($id)
    {
        $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
        $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
        $provincias          = DB::select("SELECT * FROM tbl_provincias");

        $empresa = DB::select("SELECT e.*, u.correo FROM tbl_empresa e LEFT JOIN tbl_usuarios u ON e.id_usuario=u.id WHERE e.id=?", [$id]);

        if ($empresa) {

            $localidades = [];

            if ($empresa[0]->provincia != 0) {
                $localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$empresa[0]->provincia]);
            }

            $params = [
                "actividades" => $actividades_empresa,
                "paises"      => $paises,
                "provincias"  => $provincias,
                "localidades" => $localidades,
                "empresa" => $empresa
            ];
            return view('administrator_empresa_edit', $params);
        }

        return view('administrator/empresas');

        
    }

    public function editStore(Request $request)
    {

        $this->validate($request, [
            'correo' => 'required|email',
            'nombre_empresa' => 'required',
            'nombre_resp' => 'required',
            'razon_social' => 'required',
            'telefono' => 'required|numeric',
            'descripcion_emp' => 'required',
            'pais' => 'required',
            'provincia' => 'required',
            'localidad' => 'required',
            'act_emp' => 'required',
            'direccion' => 'required',
        ],
        [
            'correo.required' => 'Correo es un campo obligatorio, no puede quedar vacío.',
            'correo.email' => 'Correo no valido.',
            'nombre_empresa.required' => 'Nombre de la empresa es un campo obligatorio, no puede quedar vacío.',
            'nombre_resp.required' => 'Nombre del responsable es un campo obligatorio, no puede quedar vacío.',
            'razon_social.required' => 'Razon social es un campo obligatorio, no puede quedar vacío.',
            'telefono.required' => 'Telefono es un campo obligatorio, no puede quedar vacío.',
            'telefono.numeric' => 'Telefono no valido.',
            'descripcion_emp.required' => 'Descripción de la empresa es un campo obligatorio, no puede quedar vacío.',
            'pais.required' => 'País es un campo obligatorio, no puede quedar vacío.',
            'provincia.required' => 'Provincia es un campo obligatorio, no puede quedar vacío.',
            'localidad.required' => 'Localidad es un campo obligatorio, no puede quedar vacío.',
            'act_emp.required' => 'Actividad de la empresa es un campo obligatorio, no puede quedar vacío.',
            'direccion.required' => 'Dirección es un campo obligatorio, no puede quedar vacío.',
        ]);

        $verificarEmail = DB::select("SELECT u.id FROM tbl_usuarios u INNER JOIN tbl_empresa e ON u.id=e.id_usuario WHERE u.correo=? AND e.id <> ?", [$request->correo, $request->id_empresa]);

        if ($verificarEmail) {
            return redirect('administracion/empresas');
        } else {
            DB::beginTransaction();

            try {
                
                if ($request->pass == "") {
                    DB::update("UPDATE tbl_usuarios SET correo=? WHERE id=?", [$request->correo, $request->id_usuario]);
                } else {
                    DB::update("UPDATE tbl_usuarios SET correo=?, clave=? WHERE id=?", [$request->correo, $request->pass, $request->id_usuario]);
                }

                DB::update("UPDATE tbl_empresa SET nombre=?, responsable=?, razon_social=?, cuit=?, telefono=?, descripcion=?, pais=?, provincia=?, localidad=?, sector=?, direccion=? WHERE id=?", [$request->nombre_empresa, $request->nombre_resp, $request->razon_social, $request->cuit, $request->telefono, $request->descripcion_emp, $request->pais, $request->provincia, $request->localidad, $request->act_emp, $request->direccion, $request->id_empresa]);

                DB::commit();
                return redirect('administracion/empresas?r=2');
            } catch (Exception $e) {
                DB::rollback();
                return redirect('administracion/empresas/edit/'.$request->id_empresa.'?r=3');
            }
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            DB::delete("DELETE FROM tbl_usuarios WHERE id=?", [$id]);
            DB::commit();
            return redirect('administracion/empresas?r=3');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('administracion/empresas?r=4');
        }
    }

    public function plantillas()
    {
        $plantillas = DB::select("SELECT * FROM tbl_plantillas_ofertas");

        return view('administrator_empresa_plantillas', compact('plantillas'));
    }

    public function plantillaStore(Request $request)
    {
        $this->validate($request,
        [
            "nombre_plantilla" => "required|unique:tbl_plantillas_ofertas",
            "titulo" => "required",
            "descripcion" => "required",
        ],
        [
            "nombre_plantilla.required" => "Nombre de plantilla es un campo obligatorio.",
            "nombre_plantilla.unique" => "Ya existe una plantilla con ese nombre.",
            "titulo.required" => "Titulo de oferta es un campo obligatorio.",
            "descripcion.required" => "Descripción de oferta es un campo obligatorio."
        ]);

        $id_empresa = isset($request->id_empresa) ? $request->id_empresa : null;
        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $request->descripcion);

        DB::beginTransaction();

        switch ($request->accion) {
            case 1: // accion para insertar
                try {
                    DB::insert("INSERT INTO tbl_plantillas_ofertas (id_empresa,nombre_plantilla,titulo_oferta,descripcion_oferta) VALUES (?,?,?,?)", [$id_empresa, $request->nombre_plantilla, $request->titulo, $descripcion]);
                    DB::commit();

                    if ($id_empresa) {
                        return redirect('empresa/plantillas?r=1');
                    } else{

                        return redirect('administracion/empresas/plantillas?r=1');
                    }
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Intentelo de nuevo.']);
                }
                break;
            
            case 2:
                try {
                    DB::update("UPDATE tbl_plantillas_ofertas SET nombre_plantilla=?, titulo_oferta=?, descripcion_oferta=? WHERE id=?", [$request->nombre_plantilla, $request->titulo, $descripcion, $request->id_plantilla]);
                    DB::commit();

                    if ($id_empresa) {
                        return redirect('empresa/plantillas?r=2');
                    } else{

                        return redirect('administracion/empresas/plantillas?r=2');
                    }
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Intentelo de nuevo.']);
                }
                break;
        }
    }

    public function getInfoPlantilla($id)
    {
        $plantilla = DB::select("SELECT * FROM tbl_plantillas_ofertas WHERE id=?", [$id]);

        echo json_encode([
            "plantilla" => $plantilla[0]
        ]);
    }

    public function ofertasForRenew(Request $request)
    {
        $condicion = '';

        if (isset($request->buscador)) {
            $condicion = " AND p.titulo LIKE '$request->buscador%' OR e.nombre LIKE '$request->buscador%'";
        }

        $ofertas = DB::select(" 
            SELECT
            p.id AS id_pub,
            p.titulo,
            e.nombre AS nombre_empresa,
            e.id AS id_empresa,
            IF(ep.id_plan=1,'GRATIS','PREMIUM') AS plan,
            DATE_FORMAT(p.tmp, '%d/%m/%Y') AS creacion_oferta,
            CONCAT(DATEDIFF(NOW(),p.tmp),' días') AS dias_antiguos
            FROM tbl_publicacion p
            LEFT JOIN tbl_empresa e ON p.id_empresa=e.id
            LEFT JOIN tbl_empresas_planes ep ON e.id=ep.id_empresa
            WHERE DATEDIFF(NOW(),p.tmp) > 10
            $condicion
            ORDER BY DATEDIFF(NOW(),p.tmp) DESC");

        return view('administrator_empresas_ofertas_renovar', compact('ofertas'));
    }

    public function renewOferta($id_pub, $id_empresa)
    {
        $plan_empresa = DB::table('tbl_empresas_planes')->select('id_plan', 'tmp as fecha_plan')->where('id_empresa',$id_empresa)->first();

        $fecha_venc_oferta = '';

        if ($plan_empresa) {
            if ($plan_empresa->id_plan == 1) {
                $fecha_venc_oferta = strtotime('+15 day', strtotime(date('Y-m-d H:i:s')));
                $fecha_venc_oferta = date('Y-m-d H:i:s', $fecha_venc_oferta);
            } else {
                $fecha_venc_oferta = strtotime('+35 day', strtotime($plan_empresa->fecha_plan));
                $fecha_venc_oferta = date('Y-m-d H:i:s', $fecha_venc_oferta);
            }

            DB::beginTransaction();

            try {
                $data = [];
                $data['estatus'] = 1;
                $data['fecha_venc'] = $fecha_venc_oferta;
                $data['tmp'] = date('Y-m-d H:i:s');

                DB::table('tbl_publicacion')->where('id', $id_pub)->update($data);

                DB::commit();
                return redirect('administracion/empresas/ofertas-renovar?r=1');
            } catch (Exception $e) {
                DB::rollback();
                return redirect('administracion/empresas/ofertas-renovar?r=2');
            }
        } else {
            return redirect('administracion/empresas/ofertas-renovar');
        }

        

        

    }

    public function cursosForApprove()
    {
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
                  DATEDIFF(NOW(), pub.fecha_venc) AS dias_venc,
                  e.nombre AS nombre_empresa,
                  e.id AS id_empresa
                  FROM
                  tbl_publicacion pub
                  LEFT JOIN tbl_cursos c ON pub.id=c.id_publicacion
                  LEFT JOIN tbl_empresa e ON pub.id_empresa=e.id
                  LEFT JOIN tbl_modalidades_curso mc ON c.id_modalidad_curso=mc.id
                  LEFT JOIN tbl_modalidades_duracion md ON c.id_modalidad_duracion=md.id
                  LEFT JOIN tbl_provincias prov ON pub.id_provincia=prov.id
                  LEFT JOIN tbl_localidades l ON pub.id_localidad=l.id
                  WHERE pub.estatus=0 AND pub.id_modalidad_publicacion=2
                ) r");

        // dd($cursos);

        return view('administrator_empresa_cursos', compact('cursos'));
    }

    public function approveCurso($id_pub)
    {
        DB::beginTransaction();
        
        try {
            DB::table('tbl_publicacion')->where('id',$id_pub)->update(['estatus' => 1]);
            DB::commit();
            return redirect('administracion/empresas/cursos-aprobar?r=1');
            
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Vuelva a intentarlo por favor']);
        }
    }

}
