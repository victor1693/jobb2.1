<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
class con_company_configuracion extends Controller
{
	public function index()
	{
		$vista=View::make('empresas.configuracion');
	    $sql="SELECT correo FROM tbl_company WHERE id=".session()->get('company_id')."";
	    try {
	    	$vista->datos=DB::select($sql);
	    	return $vista;
	    } catch (Exception $e) {
	    	
	    }
	}

	public function cambio_clave()
    { 
    		try {
    			 $sql="UPDATE tbl_company SET 
		    	 clave='".md5($this->injection($_POST['clave']))."' 
		    	 WHERE id =".session()->get('company_id')."";
		    	 DB::update($sql);
		    	 echo "1";
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('info_redes',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		} 
    }
}
