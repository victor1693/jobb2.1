<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
use Illuminate\Support\Facades\Input;
class con_noticias_dashboard extends Controller
{
    public function index()
    {
    	$vista=View::make("noticias_dashboard");
    	$sql_categorias="SELECT * FROM tbl_categorias_noticias";
    	try {
    		$datos_categorias=DB::select($sql_categorias);;
    		$vista->datos_categorias=$datos_categorias;
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    	
    }
  	public function editar_noticia($id)
    {
    	$vista=View::make("noticias_editar");
    	$sql_categorias="SELECT * FROM tbl_categorias_noticias";
    	$sql_noticia="SELECT * FROM tbl_noticias WHERE id = ".$id.";";
    	try {
    		$datos_categorias=DB::select($sql_categorias);
    		$datos_noticia=DB::select($sql_noticia);
    		$vista->datos_categorias=$datos_categorias;
    		$vista->datos_noticia=$datos_noticia; 
    		$vista->identificador=$id; 
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    	
    }
   public function add_publicacion()
   { 
   		$file="";
   		$destinationPath = 'imagenes_noticias';
		$original        ="";
		$extension       ="";
		$filename        =""; 
		$upload_success ="";

		$insert = true;

		/** VALIDANDO **/

   	 	if(Input::file('imagen_noticia')=="")
   	 	{
   	 		$insert = false;
   	 	} elseif ($_POST['noticia_titulo'] == "") {
   	 		$insert = false;
   	 	} elseif ($_POST['noticias_categoria'] == "") {
   	 		$insert = false;
   	 	} elseif ($_POST['noticias_tags'] == "") {
   	 		$insert = false;
   	 	} elseif ($_POST['noticias_descripcion'] == "") {
   	 		$insert = false;
   	 	}

   	 	if ($insert) {
	   		$sql = "INSERT INTO tbl_noticias VALUES (null,?,?,?,?,?,?,'1',null)"; 

	 		$file            = Input::file('imagen_noticia');

	   		if ($file!="")
	   		{
	 			$destinationPath = 'imagenes_noticias';
		        $original        = $file->getClientOriginalName();
		        $extension       = $file->getClientOriginalExtension();
		        $filename        = str_random(12) . "." . strtolower($extension); 
		        $upload_success = Input::file('imagen_noticia')->move($destinationPath, $filename);
	   			if ($upload_success) {
		            try {
		                DB::insert($sql, [session()->get("redactores"), $_POST['noticias_categoria'], $filename, $_POST['noticia_titulo'], $_POST['noticias_tags'], $_POST['noticias_descripcion']]); 
		                return Redirect("notipublicaciones");
		            } catch (Exception $e) {
		            }
		        } else {
		            return Response::json('error', 400);
		        } 
	   		} 
	   		else
	   		{
	   			return Redirect("panelnoticias?error=Ha ocurrido un error al cargar la imagen o no has seleccionado ninguna.");
	   		}
   	 	} else {
   	 		return Redirect("panelnoticias?error=Has dejado campos obligatorios vacios ó sin seleccionar.");
   	 	}
   } 
 
      public function publicaciones()
	   {

	   	  $vista=View::make("noticias_publicaciones");
	   	  $sql="SELECT * FROM tbl_noticias ORDER BY 1 DESC";
	   	  try {
	   	  	$datos=DB::select($sql);

	   	  	####### PAGINACIÓN #########
	   	  	$tamPag = 10;
	   	  	$numReg = count($datos);
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

	   	  	$sql="SELECT * FROM tbl_noticias ORDER BY 1 DESC LIMIT $limit,$tamPag";
	   	  	$datos=DB::select($sql);

	   	  	$vista->datos=$datos;
	   	  	$vista->paginas=$paginas;
	   	  	$vista->paginaAct=$paginaAct;
	   	  	  return $vista;
	   	  } catch (Exception $e) {
	   	  	
	   	  }  
	   } 

	    public function categorias()
	   {

	   	  $vista=View::make("noticias_categorias");
	   	  $sql="SELECT * FROM tbl_categorias_noticias";
	   	  try {
	   	  	$datos=DB::select($sql);
	   	  	$vista->datos=$datos;
	   	  	  return $vista;
	   	  } catch (Exception $e) {
	   	  	
	   	  }  
	   } 

	    public function add_categoria()
	   {

	   	  $sql="INSERT INTO tbl_categorias_noticias VALUES(null,'".$_POST['nombre_categoria']."',null)";
	   	  try {
	   	  	DB::insert($sql);
	   	  	 return Redirect("noticategorias");
	   	  } catch (Exception $e) {
	   	  	
	   	  }
	   } 

	    public function del_categoria($id)
	   {


	   	  $sql="DELETE FROM tbl_categorias_noticias WHERE id=".$id."";
	   	  $sql_actualizar="UPDATE tbl_noticias SET id_categoria = 1 WHERE id_categoria=".$id."";
	   	  try {
	   	  	DB::update($sql_actualizar);
	   	  	DB::delete($sql);
	   	  	 return Redirect("noticategorias?resul=Categoría eliminada con exito.");
	   	  } catch (Exception $e) {
	   	  	
	   	  }
	   } 

	    public function del_publicacion($id)
	   { 
	   	  $sql="DELETE FROM tbl_noticias WHERE id=".$id.""; 
	   	  try { 
	   	  	DB::delete($sql);
	   	  	 return Redirect("notipublicaciones?resul=Noticia eliminada con exito.");
	   	  } catch (Exception $e) {
	   	  	
	   	  }
	   } 
 		public function set_estado($id,$estado)
	   { 

	   	  $sql="UPDATE tbl_noticias SET estado='".$estado."' WHERE id = ".$id.""; 
	   	  try { 
	   	  	DB::update($sql);
	   	  	 return Redirect("notipublicaciones?resul=Noticia actualizada con exito.");
	   	  } catch (Exception $e) {
	   	  	
	   	  }
	   } 
	public function edit_publicacion()
	   { 

	   	$foto="";
	   	$file            = Input::file('imagen_noticia');
	   	if(isset($file))
	   	{	
	   		$destinationPath = 'imagenes_noticias';
	        $original        = $file->getClientOriginalName();
	        $extension       = $file->getClientOriginalExtension();
	        $filename        = str_random(12) . "." . strtolower($extension); 
	        $upload_success = Input::file('imagen_noticia')->move($destinationPath, $filename);
	        $foto=",foto = '".$filename."'";
	   	}
           

        $sql="UPDATE tbl_noticias SET id_categoria = ".$_POST['noticias_categoria'].",titulo = '".$_POST['noticia_titulo']."',tags = '".$_POST['noticias_tags']."',descripcion = '".$_POST['noticias_descripcion']."'".$foto." WHERE id = ".$_POST['identificador']."";

         	if(isset($file))
		   	{	
		   		 if ($upload_success) {
		            try {
		                DB::update($sql); 
		                return Redirect("panelnoticias/".$_POST['identificador']."/?result=Publicación editada con exito. ");
		            } catch (Exception $e) {
		            }
		        } else {
		            return Response::json('error', 400);
		        } 
		   	} 
		   	else
		   	{	
		   		 try {
		                DB::update($sql); 
		                return Redirect("panelnoticias/".$_POST['identificador']."/?result=Publicación editada con exito. ");
		            } catch (Exception $e) {
		            }
		   	}
	   } 


	  public function login(Request $request)
	   {
	   	$sql="SELECT *, count(id) as cantidad FROM tbl_usuarios_noticias WHERE correo=? AND clave=?";
	   	try {
	   		$datos=DB::select($sql, [strtolower($_POST['correo']), $_POST['pass']]);
	   		if($datos[0]->cantidad==1)
	   		{
	   			  $request->session()->set('redactores', $datos[0]->id);
                  $request->session()->set('nombre', $datos[0]->nombre); 
	   			return Redirect("panelnoticias");
	   		}
	   		else
	   		{
	   			return Redirect("redactores");
	   		}
	   	} catch (Exception $e) {
	   		
	   	}
	   }

	   public function salir(Request $request)
    { 
        $request->session()->forget('redaptores');
        $request->session()->forget('nombre');
        return redirect('redactores');
    }
}
