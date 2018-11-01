<?php

namespace App\Http\Controllers;

use MP;

use View;

use DB;

use Illuminate\Http\Request;


class con_pagos extends Controller
{
    public function index()
    {
        return view("administrator_pagos");
    }

    public function requestMP()
    {


    	$iva = 0;
    	$total = 0;
    	$servicios = array();
    	$plan = DB::select("SELECT descripcion AS nombre, valor AS precio FROM tbl_planes WHERE id=$_REQUEST[plan]");
    	$total += floatval($plan[0]->precio);
    	
    	$suttotal = $total * floatval($iva);
    	try {
    		$ex = "succesfull";
    		$st = 1;
    		$preference_data = array(
    			"items" => array(
    				array(
    					"title" => "Pago servicios",
    					"currency_id" => "ARS",
    					"quantity" => 1,
    					"unit_price" => ($total + $suttotal)
    				)
    			)
    		);
    		$preference = MP::create_preference($preference_data);
    	}
    	catch(Exception $e) {
    		$st = 2;
    		$ex = $e->getMessage();
    	}
    	echo json_encode(array("status" => $st, "data" => $preference, "servicios" => $plan, "msg" => $ex, "iva" => $iva));
    }

    public function updatePlan(Request $request)
    {
    	$info_plan = DB::select("SELECT * FROM tbl_planes WHERE id=$_REQUEST[plan]");
    	$status = '';

    	DB::beginTransaction();

    	try {

    		DB::update("UPDATE tbl_empresas_planes SET id_plan='".$info_plan[0]->id."', tmp='".date('Y-m-d H:i:s')."' WHERE id_empresa=".session()->get("emp_ide"));

    		$request->session()->set("emp_plan", $info_plan);

    		$transaction = (isset($_REQUEST["transaction"]) ? json_decode($_REQUEST["transaction"]) : 'Plan gratis');

    		$approved = $transaction->collection_status == "approved" ? 1 : 0;

    		DB::insert("INSERT INTO tbl_empresas_pagos (tipo_user, operacion, id_usuario, fecha_pago, medio_pago, monto, estatus) VALUES (1,'".$transaction->preference_id."',".session()->get("emp_ide").", '".date("Y-m-d H:i:s")."', 2, ".$info_plan[0]->valor.", $approved)");

    		DB::commit();
    		$status = 1;
    	} catch (Exception $e) {
    		DB::rollback();
    		$status = 2;
    	}

    	echo json_encode(array("status" => $status));
    }
}
