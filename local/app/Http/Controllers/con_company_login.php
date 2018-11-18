<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
class con_company_login extends Controller
{
    public function login(Request $request)
    {
    	if($_POST['correo']!="" && $_POST['clave']!="")
    	{ 
    		try {
    			$sql="SELECT *,count(id) as cantidad  FROM tbl_company 
	    		WHERE correo='".$this->injection(strtolower($_POST['correo']))."' 
	    		AND clave ='".md5($this->injection(strtolower($_POST['clave'])))."'";
	    		 $datos=DB::select($sql);
               
                if($datos[0]->cantidad==1)
	    		{
                    $sql="
                    SELECT count(id) AS cantidad,fecha_ven
                    FROM tbl_company_promociones 
                    WHERE id_empresa = ".$datos[0]->id." AND id_promocion = 1";
                    $datos_promo=DB::select($sql);
                    if($datos_promo[0]->cantidad>0)
                    {
                        
                        if(date('Y-m-d')>$datos_promo[0]->fecha_ven)
                        {
                            $sql="UPDATE tbl_company SET plan='Gratis' WHERE id=".$datos[0]->id."";
                            DB::update($sql);
                            $request->session()->set('company_plan','Gratis');
                        } 
                        else
                        {
                            $request->session()->set('company_plan',$datos[0]->plan);
                        }
                    }
                    else
                    {
                        $request->session()->set('company_plan',$datos[0]->plan);
                    }

	    			$request->session()->set('company_id',$datos[0]->id);
	    			$request->session()->set('company_img',$datos[0]->img_profile);
	    			$request->session()->set('company_nombre',$datos[0]->nombre); 
	    			$request->session()->set('tipo_usuario','1'); 

	    			echo "1";

	    		}
	    		else{echo "0";} 
    		}catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('login',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		}
    	}
    	
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('company_id');
    	$request->session()->forget('company_img');
    	$request->session()->forget('company_nombre');
    	$request->session()->forget('company_plan');
        $request->session()->forget('tipo_usuario'); 
    	return Redirect('empresas/entrar'); 
    }
}
