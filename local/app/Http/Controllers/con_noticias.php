<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
class con_noticias extends Controller
{
    public function index()
    {
    	$vista=View::make("noticias");
    	$condiciones="";
    	if(isset($_POST['categoria']) && $_POST['categoria']!="")
    	{
    		$condiciones=$condiciones." AND id_categoria =".$_POST['categoria']."";
    	}
    	$sql="SELECT * FROM tbl_noticias WHERE estado='1' $condiciones ORDER BY 1 DESC";
        $datos_noticias = DB::select($sql);

        ####### PAGINACIÓN #########
        $tamPag = 15;
        $numReg = count($datos_noticias);
        $paginas = ceil($numReg/$tamPag);
        $limit = "";
        $paginaAct = "";
        if (!isset($_GET['pag'])) {
            $paginaAct = 1;
            $limit = 0;
        } else {
            $paginaAct = $_GET['pag'];
            $limit = ($paginaAct-1) * $tamPag;
        }

        $datos_noticias=DB::select($this->consultaPagination($condiciones,$limit,$tamPag));
       
    	$sql_categorias="SELECT cn.id, cn.descripcion, COUNT(n.id_categoria) AS cantidad FROM tbl_categorias_noticias cn LEFT JOIN tbl_noticias n ON cn.id=n.id_categoria WHERE cn.id IN (SELECT n.id_categoria FROM tbl_noticias n WHERE estado='1' $condiciones)GROUP BY cn.id ORDER BY cantidad DESC";
    	try {
    		$datos= $datos_noticias;
    		$datos_categorias=DB::select($sql_categorias);
    		$vista->datos=$datos;
            $vista->datos_categorias=$datos_categorias;
            $vista->paginas=$paginas;
    		$vista->paginaAct=$paginaAct;
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    }

    private function consultaPagination($condiciones,$limit,$tamPag)
    {
        $sql="SELECT * FROM tbl_noticias WHERE estado='1' " .$condiciones . " ORDER BY 1 DESC LIMIT $limit,$tamPag";

        return $sql;
    }

    public function noticia($id)
    {
    	$vista=View::make("noticias_detalle"); 
    	$sql="SELECT *,count(id) as cantidad FROM tbl_noticias WHERE id =".$id." AND estado='1';";
    	$sql_datos="SELECT * FROM tbl_noticias WHERE estado = '1' LIMIT 0,5";
     
        $sql_categorias="SELECT cn.id, cn.descripcion, COUNT(n.id_categoria) AS cantidad FROM tbl_categorias_noticias cn LEFT JOIN tbl_noticias n ON cn.id=n.id_categoria WHERE cn.id IN (SELECT n.id_categoria FROM tbl_noticias n WHERE estado='1')GROUP BY cn.id ORDER BY cantidad DESC";
    	try {
    		$datos=DB::select($sql);
    		$datos_limitadas=DB::select($sql_datos);
    		$datos_categorias=DB::select($sql_categorias);
    		$vista->datos=$datos;
    		$vista->datos_limitadas=$datos_limitadas;
    		$vista->datos_categorias=$datos_categorias;
    		if($datos[0]->cantidad==1)
    		{
    			return $vista;
    		}
    		else
    		{
    			return Redirect('noticias');
    		}
    		
    	} catch (Exception $e) {
    		
    	}
    } 
}
