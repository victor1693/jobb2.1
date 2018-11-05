<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_company_planes extends Controller
{
    public function index()
    {
    	$vista=View::make("empresas.planes");
    	return $vista;
    }

    public function bienvenida()
    {
    	$fecha = date('Y-m-d');
		$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );

    	$sql="UPDATE tbl_company SET plan ='Premium', venc_plan = '".$nuevafecha."' WHERE id =".session()->get('company_id').""; 
    	$sql_up="INSERT INTO tbl_company_promociones (id_empresa,id_promocion,fecha_ven)
    	VALUES(".session()->get('company_id').",1,'".$nuevafecha."')
    	";
    	DB::insert($sql_up);
        DB::update($sql);
    	session()->set('company_plan','Premium');
    	return Redirect('empresas/panel'); 
    }

     public function modal_venc()
    { 
        $sql="UPDATE tbl_company SET modal_venc =1 WHERE id =".session()->get('company_id')."";  
        DB::update($sql); 
        echo "1";
    }
}
