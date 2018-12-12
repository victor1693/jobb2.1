<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
require("scrap/simple_html_dom.php");

class con_scrapping extends Controller
{
    public function index()
    {
    	$filtro=" WHERE 1 = 1 ";
    	if(isset($_GET['buscar']) && $_GET['buscar']!="")
    	{
    		$filtro=$filtro.'AND titulo like "%'.$_GET["buscar"].'%"';
    	}
    	if(isset($_GET['provincia']) && $_GET['provincia']!="")
    	{
    		$filtro=$filtro.'AND provincia = "'.$_GET['provincia'].'"';
    	}
    	if(isset($_GET['localidad']) && $_GET['localidad']!="")
    	{
    		$filtro=$filtro.'AND localidad  = "'.$_GET['localidad'].'"';
    	}
    	if(isset($_GET['empresa']) && $_GET['empresa']!="")
    	{
    		$filtro=$filtro.'AND empresa = "'.$_GET['empresa'].'"';
    	}
    	$vista=View::make("scrapping");
    	$sql="SELECT  * FROM tbl_scrapping ".$filtro." GROUP BY url ORDER BY id DESC";

    	$ofertas_jobbers="SELECT  t1.*,t2.img_profile,t2.nombre as empresa FROM tbl_company_ofertas t1
    	INNER JOIN tbl_company t2 ON t2.id = t1.id_empresa
    	WHERE t1.plantilla <> 'SI' AND t1.estatus=1 
    	ORDER BY t1.id DESC
    	LIMIT 0,4";

    	$provincias="SELECT provincia FROM tbl_scrapping  GROUP BY provincia ORDER BY provincia ASC";
    	$filtro_provincia="";
        if(isset($_GET['provincia']) && $_GET['provincia'] !="")
        {
            $filtro_provincia=$filtro_provincia."  AND provincia = '".$_GET['provincia']."'";
        }
        $localidad="SELECT localidad FROM tbl_scrapping  
        WHERE 1 = 1 ".$filtro_provincia."
        GROUP BY localidad ORDER BY localidad ASC";
     
        $empresa="SELECT empresa FROM tbl_scrapping  GROUP BY empresa ORDER BY empresa ASC";
    	$sql_publicidad="SELECT * FROM tbl_publicidad_empresa ORDER BY vistos ASC LIMIT 0,3";
        $publicidad=DB::select($sql_publicidad); 
        foreach ($publicidad as $key) {

            DB::update('UPDATE tbl_publicidad_empresa SET vistos ='.($key->vistos + 1).' WHERE id = '.$key->id.'');
        }

    	$datos=DB::select($sql);
    	$vista->datos=$datos;
    	$vista->ofertas=DB::select($ofertas_jobbers);
    	$vista->publicidad=$publicidad;
    	$vista->provincia=DB::select($provincias);
    	$vista->localidad=DB::select($localidad);
    	$vista->empresas=DB::select($empresa); 
    	return $vista;
    }

      public function detalle($url)
    {
    	$vista=View::make("detalle-scrapping");
    	$sql="SELECT  * FROM tbl_scrapping WHERE amigable='".utf8_encode($url) ."'";
        
    	$datos=DB::select($sql);
    	$sql_mas_ofertas="SELECT * FROM tbl_scrapping WHERE empresa = '".$datos[0]->empresa."' AND amigable <> '".$url."'";
     
        $vista->ofertas = DB::select($sql_mas_ofertas);
    	$vista->datos=$datos;
    	return $vista;
    }

    function url_exists($url)
        {

        @$headers = get_headers($url);
        if (preg_match('/^HTTP\/\d\.\d\s+(200|301|302)/', $headers[0])){
           return true;
        }
        else return false;
        }

    public function computrabajo()
    {
        $pagina=1;
        $hasta=1;
        if(isset($_GET['pagina']) && $_GET['pagina']>0)
        {
            $pagina=$_GET['pagina'];
        }
        if(isset($_GET['hasta']) && $_GET['hasta']>0)
        {
            $pagina=$_GET['hasta'];
        }
        $contador=$pagina;
        while($contador>=$hasta){
        $html=file_get_html('https://www.computrabajo.com.ar/ofertas-de-trabajo/?p='.$contador);
        $contenedor=$html->find('div[class=bClick]');

            $foto="";
            $empresa="";
            $url="";
            $html="";
            $descripcion="";
            $descripcion="";
            $amigable="";
            $dom_titulo="";
            $dom_empresa="";
            $dom_provincia="";
            $empresa_arr="";
            $dom_img="";
            $dom_link="";

         foreach ($contenedor as $key) {
            $dom_titulo=$key->find('div[class=iO] h2 a');
           $dom_empresa=$key->find('div[class=w_100 fl mtb5 lT] span span a');
            $dom_provincia=$key->find('div[class=w_100 fl mtb5 lT] span span span a');

            $empresa="";
            if(isset($dom_empresa[0]))
            {
                 $empresa_arr=explode("-",strip_tags($dom_empresa[0]));
                 $empresa=$empresa_arr[0];
            }
            else
            {
                $emprsa="";
            }
            $dom_img=$key->find('img');
            $dom_link=$key->find('a[class=js-o-link]');
             if(!isset($dom_img[0]->attr['data-original']))
            {
                $dom_img[0]->attr['data-original']="";
            }

            $titulo=strip_tags($dom_titulo[0]); 
            $provincia="";
            $localidad="";

            if(isset($dom_provincia[0]))
            {
                  $provincia=trim(strip_tags($dom_provincia[0]));
            }
            if(isset($dom_provincia[1]))
            {
                  $localidad=trim(strip_tags($dom_provincia[1]));
            }


            $foto=$dom_img[0]->attr['data-original']; 
            $empresa=trim(strip_tags($empresa));
            $url="https://www.computrabajo.com.ar".$dom_titulo[0]->attr['href'];
            $html=file_get_html($url);
            $descripcion=$html->find('ul[class=p0 m0]');
            $descripcion_2=str_replace("'", "",str_replace('</li>','',str_replace('<li>','',$descripcion[0]))) ;
            $amigable='trabajos-en-'.($provincia).'-'.$this->scrap_amigable($titulo);  

            $sql="INSERT INTO tbl_scrapping (titulo,empresa,provincia,localidad, url,img,amigable,pagina,descripcion)
            VALUES(
            '".str_replace("'","",$titulo)."',
            '".str_replace("'","",$empresa) ."',
            '".$provincia."',
            '".$localidad."',
            '".$url."',
            '".$foto."',
            '".utf8_encode($amigable)."',
            'Computrabajo',
            '".str_replace("´","",str_replace("'","",str_replace('Requerimientos','',str_replace('Descripción','',$descripcion_2)))) ."'
            )
            ";
            $sql_consulta="SELECT count(id) AS cantidad FROM tbl_scrapping WHERE url = '".$url."'";
            $datos=DB::select($sql_consulta);
            if($datos[0]->cantidad==0 && $provincia!="" && $localidad=!"")
            {
                DB::insert($sql); 
            }
                      
         }
         usleep(50000); 
        $contador=$contador-1;
        }

        $sql="UPDATE tbl_scrapping SET provincia = trim(provincia),localidad = trim(localidad);";
        DB::update($sql);

        $sql="UPDATE tbl_scrapping SET localidad = REPLACE(localidad, 'Cordoba', 'Córdoba')";
        DB::update($sql);
        echo "Contador: ".$contador."<br>";
    }

    public function bumeran()
    { 
        $pagina=1;
        $hasta=1;
        if(isset($_GET['pagina']) && $_GET['pagina']>0)
        {
            $pagina=$_GET['pagina'];
        }
        if(isset($_GET['hasta']) && $_GET['hasta']>0)
        {
            $pagina=$_GET['hasta'];
        }
        $contador=$pagina;
        while($contador>=$hasta)
        {
 
            

            $html=file_get_html('https://www.bumeran.com.ar/empleos-pagina-'.$contador.'.html?recientes=true');
            $contenedor=$html->find('div[class=aviso]'); 
           
             $url_dom="";
             $datos_empresas_dom="";
             $datos_imagen_dom="";
             $titulo="";
             $url="";
             $empresa="";
             $localidad="";
             $provincia=""; 
             $html_descripcion="";
             $descripcion="";

             foreach ($contenedor as $key) {   
             $url_dom=$key->find('div[class=wrapper]');
             $datos_empresas_dom=$key->find('div[class=wrapper] div[class=wrapper-empresa]'); 
             $datos_imagen_dom=$key->find('div[class=wrapper-imagen]'); 
             $titulo=strip_tags($url_dom[0]->children[0]); 
             $url='https://www.bumeran.com.ar'.$url_dom[0]->children[0]->attr['href']; 
             $empresa = strip_tags($datos_empresas_dom[0]->children[0]); 
             $localidad=str_replace(' ,','', strip_tags($datos_empresas_dom[0]->children[2])) ;
         

                    $provincia="";
                     if(isset($datos_empresas_dom[0]->children[3]))
                        {
                           $provincia=str_replace(' ,','', strip_tags($datos_empresas_dom[0]->children[3]));  
                        } 
                     $imagen="";
                     if(isset($datos_imagen_dom[0]->children[0]->children[0]->attr['src']))
                     {
                        $imagen=strip_tags($datos_imagen_dom[0]->children[0]->children[0]->attr['src']); 
                     } 
                     $html_descripcion=file_get_html($url);
                     $descripcion=$html_descripcion->find('div[class=aviso_description]'); 
                     $new_descripcion=str_replace("'","",$descripcion[0]);
                    $sql = "INSERT INTO tbl_scrapping (titulo,empresa,provincia,localidad,descripcion,img,url,pagina,amigable)
                    VALUES(
                    '".($titulo)."',
                    '".($empresa)."',
                    '".($provincia)."',
                    '".($localidad)."',
                    '".($new_descripcion)."',
                    '".($imagen)."',
                    '".($url)."',
                    'Bumeran',
                    'trabajo-en-".str_replace(' ','-',strtolower(($provincia))) ."-".$this->scrap_amigable(($titulo))."');
                    ";
                     
                    $sql_consulta="SELECT count(id) AS cantidad FROM tbl_scrapping WHERE url = '".$url."'";
                    $datos=DB::select($sql_consulta);
                    if($datos[0]->cantidad==0)
                    {
                        
                        if($descripcion[0]!="Array" && $provincia!="")
                        {
                             DB::insert($sql); 

                             
                        }
                    } 
            } 
            
        usleep(50000); 
        $contador=$contador-1;
        }

        $sql="UPDATE tbl_scrapping SET provincia = trim(provincia),localidad = trim(localidad);";
        DB::update($sql);

        $sql="UPDATE tbl_scrapping SET localidad = REPLACE(localidad, 'Cordoba', 'Córdoba')";
        DB::update($sql);
        echo "Contador: ".$contador."<br>";

    }

    function quitar_espacios()
    {
        $sql="UPDATE tbl_scrapping SET provincia = trim(provincia),localidad = trim(localidad);";
        DB::update($sql);
    }
    /*Funciones necesarias para el scrapping*/
    function scrap_amigable($text)
    {
        $fecha=date('dmy').round(microtime(true) * 1000);
        $new=strtolower($this->scrap_limpiarurl($text)).'-'.$fecha; 
        $limpio=str_replace('--','-',$new);
        $contador=1;
        while ($contador <= 10) {
            $limpio=str_replace('--','-',$limpio);
            $contador++;
        }
        return $limpio;
    }
     function scrap_limpiarurl($valor)
    {
        
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("¿","",$valor); 
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor); 
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("¡","",$valor); 
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("á","a",$valor);
        $valor = str_ireplace("é","e",$valor);
        $valor = str_ireplace("í","i",$valor);
        $valor = str_ireplace("ó","o",$valor);
        $valor = str_ireplace("ú","u",$valor);
        $valor = str_ireplace("Á","A",$valor);
        $valor = str_ireplace("É","E",$valor);
         $valor = str_ireplace(",","",$valor);
        $valor = str_ireplace("Í","I",$valor);
        $valor = str_ireplace("ñ","n",$valor);
        $valor = str_ireplace("Ó","O",$valor);
        $valor = str_ireplace("Ú","U",$valor);
        $valor = str_ireplace(" ","-",$valor); 
        $valor = str_ireplace("#","",$valor);
        $valor = str_ireplace("/","",$valor);

        return $valor;
    }
}
