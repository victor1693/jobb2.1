<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Socialite;
use Redirect;
use DB;
use Image;
class con_log_social extends Controller
{ 
	
	public function redirectToProvider($proveedor)
		{
		 
		return Socialite::driver($proveedor)->redirect();
		}
 
	public function callback($proveedor)
		{ 
		$token=$this->generateRandomString(74);

		$user = Socialite::driver($proveedor)->stateless()->user();

		if($proveedor=='linkedin')
		{
			 
			 $user->avatar_original=$user['pictureUrl'];
			  
		}
		$sql="SELECT count(id) as total,correo,token FROM tbl_tokens_social_verification WHERE correo='".$user->email."'";	 
		$datos=DB::select($sql);
			if($datos[0]->total==0)
			{
				return Redirect('redes_users?token='.$token.'&user='.$user->email.'&name='.$user->name.'&pic='.$user->avatar_original.'&red='.$proveedor); 
			}
			else if($datos[0]->total==1)
			{				 
				return Redirect('socialmedia?token='.$datos[0]->token.'&user='.$datos[0]->correo.'&secure=1'.'&pic='.$user->avatar_original.'&red='.$proveedor);
			}
		 
		} 

	public function add_user()
	{
		$imagen = file_get_contents($_POST['pic']);
		$archivo=$this->generateRandomString(15).'.jpg';

		file_put_contents('uploads/'.$archivo, $imagen);
		Image::make("uploads/".$archivo)->resize(80, 80)->save("uploads/min/".$archivo); 
        Image::make("uploads/".$archivo)->resize(200, 200)->save("uploads/md/".$archivo);
		 
		$token=$this->generateRandomString(65);
		if(isset($_POST['email']) && isset($_POST['name']) && $_POST['email']!=""  && $_POST['name']!="" && $_POST['tipo_user']!="")
		{
			$sql_general="INSERT INTO tbl_tokens_social_verification VALUES(null,'".$_POST['email']."','".$token."',null);";
			if($_POST['tipo_user']=="1")
			{	 

				$sql="INSERT INTO tbl_usuarios VALUES(
				null,
				'".$_POST['email']."',
				'',
				'".md5("123654789")."',
				2,
				'".$token."',
				1,
				'".$this->generateRandomString(40)."',
				null
			)";
		 
			try {
				DB::insert($sql);
				DB::insert($sql_general);
				$this->pic_name($_POST['email'],$archivo,$_POST['name']);
				return Redirect('socialmedia?token='.$token.'&user='.$_POST['email'].'&secure=1');
			} catch (Exception $e) {
				
			}
			}
			else if($_POST['tipo_user']=="2")
			{

				$sql="";
				$sql="INSERT INTO tbl_usuarios VALUES(
				null,
				'".$_POST['email']."',
				'',
				'".md5("123654789")."',
				1,
				'".$token."',
				1,
				'".$this->generateRandomString(40)."',
				null
				)";

				try {
					DB::insert($sql);
					DB::insert($sql_general);
					$datos=DB::select("SELECT id FROM tbl_usuarios WHERE correo='".$_POST['email']."'");
					DB::insert("INSERT INTO tbl_empresa (id,id_usuario) VALUES(".$datos[0]->id.",".$datos[0]->id.")");
					DB::insert("INSERT INTO tbl_empresas_planes VALUES(null,".$datos[0]->id.",1,null)");
					$this->pic_name($_POST['correo'],$archivo,$_POST['name']);
					return Redirect('socialmedia?token='.$token.'&user='.$_POST['email'].'&secure=1');
				} catch (Exception $e) {
					
				}
			}
		}
		
	}

 
	public function pic_name($correo,$imagen,$nombre)
	{
		$extencion=explode('.', $imagen);
		$sql="SELECT count(tipo_usuario) as cantidad,tipo_usuario,id FROM tbl_usuarios WHERE correo='".$correo."'";
		try {
				$datos=DB::select($sql);
				if($datos[0]->cantidad>0)
				{	$id=$datos[0]->id;
					$sql_imagen="INSERT INTO tbl_archivos VALUES(null,".$id.",'".$imagen."','".$extencion[1]."','','".$imagen."','Imagen',null);";
						DB::insert($sql_imagen);
						$sql_profile_img="SELECT id FROM tbl_archivos WHERE archivo='".$imagen."' AND id_usuario=".$id."";
						$datos_imagen=DB::select($sql_profile_img);
						$sql="INSERT INTO tbl_usuarios_foto_perfil VALUES (null,".$id.",".$datos_imagen[0]->id.",null)";
						DB::insert($sql);

					if($datos[0]->tipo_usuario=='2')
					{
						
						$sql="
						INSERT INTO 
						tbl_candidato_datos_personales (id,id_usuario,nombres) 
						VALUES(null,".$id.",'".$nombre."')"; 
						DB::insert($sql); 					
					}
				}
				return true;
		} catch (Exception $e) {
			
		}
		 
	}
	public function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	} 
	 
}
