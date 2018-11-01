<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class con_contacto extends Controller
{
    public function create()
    {
    	$sql="INSERT INTO tbl_contacto VALUES
    	(
    	null,
    	'".$_POST['correo']."',
    	'".$_POST['asunto']."',
    	'".$_POST['nombres']."',
    	'".$_POST['mensaje']."',
    	'0',
    	null
    	);";
    	try {
    		DB::insert($sql);
    		return Redirect('contacto');
    	} catch (Exception $e) {
    		
    	}
    } 
}
