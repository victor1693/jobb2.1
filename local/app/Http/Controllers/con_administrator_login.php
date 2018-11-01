<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use view;

class con_administrator_login extends Controller
{
    public function index()
    {
        return View("administrator_login");
    }

    public function login(Request $request)
    {
        
        $log = DB::table('tbl_administrador')
                ->where('usuario', $request->usuario)
                ->where('clave', md5($request->pass))
                ->first();

        if ($log) {
            $request->session()->set('admin', $log->usuario);
            return redirect('administracion/panel');
        }

        return redirect()->back()->withErrors(['Usuario o contraseña incorrectos.']);

    }
    public function salir(Request $request)
    {
        $request->session()->forget('admin');
        $request->session()->flush();
        return redirect('administrador');
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
        $request->session()->forget('tipo_usuario');
        $request->session()->flush();
    }

}
