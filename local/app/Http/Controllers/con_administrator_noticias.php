<?php 
namespace App\Http\Controllers; 
use View;
use DB;
use Illuminate\Support\Facades\Input;
Use File;
use Image;
class con_administrator_noticias extends Controller
{
    public function index()
    {
        $sql="";
        $vista=View::make('administrator_noticias');
        if(isset($_POST['buscador']) && $_POST['buscador']!="")
        {
             $sql="SELECT t1.*,t2.nombre as redactor FROM `tbl_noticias` t1
             INNER JOIN tbl_usuarios_noticias t2 ON t2.id = t1.id_usuario
             WHERE t1.titulo LIKE  '%".$_POST['buscador']."%' ORDER BY t1.tmp  desc
             ";
             $vista->buscador=$_POST['buscador'];

        }
        else
        {
             $sql="SELECT t1.*,t2.nombre as redactor FROM `tbl_noticias` t1
            INNER JOIN tbl_usuarios_noticias t2 ON t2.id = t1.id_usuario ORDER BY t1.tmp  desc"; 
             $vista->buscador="";
        }
       
        try {
            $datos=DB::select($sql);
            $vista->datos=$datos;
            return $vista;
        } catch (Exception $e) {
            
        } 
    }
    
     public function eliminar_noticia($id)
    {
         $sql="DELETE FROM tbl_noticias WHERE id =".$id."";
        try {
            DB::delete($sql);
             return Redirect("administracion/noticias?result=Noticia eliminada con éxito.");
        } catch (Exception $e) {
            
        }
    }
    public function publicar()
    {
        $vista         = View::make("administrator_noticias_publicar");
        $vista->titulo = "Nueva publicación";
        $vista->action = "../publicarnoticias";
        $vista->identificador="";
          $sql_categorias="SELECT * FROM tbl_categorias_noticias";
          try {
                $categorias = DB::select($sql_categorias);
                $vista->categorias=$categorias;
                 return $vista;
            } catch (Exception $e) {
                
            }  
       
    }
    public function nueva_noticia()
    {
        $imagen="";
         if(Input::file('imagen_noticia') != "")
         {
             $subir = $this->subir_archivo(Input::file('imagen_noticia'));
           
             if($subir!="" && $subir!=null)
             { 
                $imagen=$subir;
             }
             else
                {
                    $imagen="";
                };
         }

        $sql="INSERT INTO tbl_noticias VALUES(
        null,
        1,
        ".$_POST['noticias_categoria'].",
        '".$imagen."',
        '".$_POST['noticia_titulo']."',
        '".$_POST['noticias_tags']."',
        '".$_POST['noticias_descripcion']."',
        1,null);";
        try {
            DB::insert($sql);
             return Redirect("administracion/noticias?result=Noticia agregada con éxito."); 
        } catch (Exception $e) {
            
        }
    }
     public function actualizar_noticia()
    {
         if(Input::file('imagen_noticia') != "")
         {
             $subir = $this->subir_archivo(Input::file('imagen_noticia'));
           
             if($subir!="" && $subir!=null)
             {
                $sql="UPDATE tbl_noticias SET foto = '".$subir."' WHERE id =".$_POST['id']."";
                try {
                    DB::update($sql); 
                } catch (Exception $e) {
                    
                }
             }
         }

         $sql="UPDATE tbl_noticias SET titulo='".$_POST['noticia_titulo']."', tags='".$_POST['noticias_tags']."', id_categoria=".$_POST['noticias_categoria'].", descripcion='".$_POST['noticias_descripcion']."' WHERE id =".$_POST['id']."";
         try {
                    DB::update($sql);
                     return Redirect("administracion/noticias/".$_POST['id']."?result=Noticia actualizada con éxito.");
                } catch (Exception $e) {
                    
                }
        
        
    }
    public function editar($id)
    {
        $vista         = View::make("administrator_noticias_publicar");
        $vista->titulo = "Editar publicación"; 

        $sql="SELECT t1.*,t2.nombre as redactor FROM `tbl_noticias` t1
            INNER JOIN tbl_usuarios_noticias t2 ON t2.id = t1.id_usuario WHERE t1.id=".$id."";
        $sql_categorias="SELECT * FROM tbl_categorias_noticias";
        try {
                $datos=DB::select($sql);
                $categorias=DB::select($sql_categorias);
                $vista->datos=$datos;
                $vista->categorias=$categorias;
                $vista->action="../../administracion/actualizarnoticias";
                $vista->identificador=$id;
                return $vista;

        } catch (Exception $e) {
            
        }
      
    }
    
    public function categorias()
    {
        return view('administrator_noticias_categorias');
    }
    
    
    public function redactores()
    {
        $vista = View::make("administrator_redactores");
        $sql   = "SELECT * FROM tbl_usuarios_noticias;";
        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        }
        catch (Exception $e) {
            
        }
    }
    
    public function redactores_nuevo()
    {
        return view('administrator_redactores_nuevo');
    }
    
    public function nuevo_redactor()
    {
        $sql = "INSERT INTO tbl_usuarios_noticias VALUES(null,'" . $_POST['nombre'] . "','" . $_POST['correo'] . "','" . $_POST['clave'] . "','" . $_POST['funcion'] . "',1,null);";
        try {
            DB::insert($sql);
            return Redirect("administracion/redactores?result=Redactor agregado con éxito.");
        }
        catch (Exception $e) {
            
        }
    }
    
    public function redactores_editar($id)
    {
        $sql = "SELECT * FROM tbl_usuarios_noticias WHERE id = $id;";
        try {
            $vista        = View::make('administrator_redactores_editar');
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        }
        catch (Exception $e) {
            
        }
    }
    public function actualizar_redactores()
    {
        $sql = "UPDATE tbl_usuarios_noticias SET
        nombre='" . $_POST['nombre'] . "',
        correo='" . $_POST['correo'] . "',
        funcion='" . $_POST['funcion'] . "',
        clave='" . $_POST['clave'] . "' 
        WHERE id= " . $_POST['id'] . "
        ";
        try {
            DB::update($sql);
            return Redirect("administracion/redactores/" . $_POST['id'] . "/?result=Redactor actualizado con éxito.");
        }
        catch (Exception $e) {
            
        }
        
    }
    public function redactores_bloquear($id)
    {
        $sql = "UPDATE tbl_usuarios_noticias SET estatus = 0 WHERE id=" . $id . ";";
        try {
            DB::update($sql);
            return Redirect("administracion/redactores?result=Redactor bloqueado con éxito.");
        }
        catch (Exception $e) {
            
        } 
    }
    
    public function redactores_desbloquear($id)
    {
        $sql = "UPDATE tbl_usuarios_noticias SET estatus = 1 WHERE id=" . $id . ";";
        try {
            DB::update($sql);
            return Redirect("administracion/redactores?result=Redactor desbloqueado con éxito.");
        }
        catch (Exception $e) {
            
        } 
    }

    public function noticias_bloquear($id)
    {
        $sql = "UPDATE tbl_noticias SET estado = '0' WHERE id=" . $id . ";";
        try {
            DB::update($sql);
            return Redirect("administracion/noticias?result=Noticia bloqueada con éxito.");
        }
        catch (Exception $e) {
            
        } 
    }
    
    public function noticias_desbloquear($id)
    {
        $sql = "UPDATE tbl_noticias SET estado = '1' WHERE id=" . $id . ";";
        try { 
            DB::update($sql);
            return Redirect("administracion/noticias?result=Noticia desbloqueada con éxito.");
        }
        catch (Exception $e) {
            
        } 
    }

    public function subir_archivo($archivo)
    {
        
        $file            = $archivo;
        $destinationPath = 'imagenes_noticias';
        $original        = $file->getClientOriginalName();
        $extension       = $file->getClientOriginalExtension();
        $filename        =  str_random(30) . "." . strtolower($extension);
        $upload_success = $archivo->move($destinationPath, $filename);

        
            return $filename;
        
    }
}