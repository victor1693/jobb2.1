<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use View;

class con_index extends Controller
{
 
    public function index()
    {
        $vista= View::make("index");
       

        $sql_postulados="SELECT count(id) as cantidad FROM tbl_company_postulados;";
        $sql_ofertas="SELECT count(id) as cantidad FROM tbl_company_ofertas WHERE estatus = 1 AND plantilla <> 'SI';";
        $sql_candidatos="SELECT count(id) as cantidad FROM tbl_usuarios WHERE tipo_usuario = 2;";
        $sql_empresas="SELECT count(id) as cantidad FROM tbl_company;";
        $sql_categorias="SELECT sector,count(id) as cantidad FROM tbl_company_ofertas GROUP BY sector ORDER by count(id) desc LIMIT 0,4";
        $sql_top_empresas= "SELECT t2.id as id_empresa,
        t2.img_profile,
        t2.nombre,
        concat(t2.provincia,' ',t2.localidad) as direccion,
        t1.sector,
        count(t1.id) as cantidad 
        FROM tbl_company_ofertas t1
        INNER JOIN tbl_company t2 ON t2.id = t1.id_empresa
        GROUP BY t1.id_empresa 
        ORDER by count(t1.id) desc LIMIT 0,50";
        $sql_ultimas_ofertas= "
        SELECT t1.vistas,t1.id,t1.titulo,t1.descripcion,t1.sector,t2.nombre,t2.img_profile,t1.plan_estado
        FROM 
        tbl_company_ofertas t1
        INNER JOIN tbl_company t2 ON t2.id = t1.id_empresa
        WHERE t1.plantilla <> 'SI' AND t1.estatus = 1
        ORDER BY t1.tmp desc
        LIMIT 0,12";

        $sql_ultimas_noticias= "
        SELECT t1.id,t1.titulo,t1.foto,t2.descripcion FROM tbl_noticias t1
        INNER JOIN tbl_categorias_noticias t2 ON t2.id = t1.id_categoria
        ORDER BY t1.id DESC
        LIMIT 0,12";

        
        

        $vista->postulados=DB::select($sql_postulados);
        $vista->top_empresas=DB::select($sql_top_empresas);
        $vista->ofertas=DB::select($sql_ofertas);
        $vista->candidatos=DB::select($sql_candidatos);
        $vista->empresas=DB::select($sql_empresas);
        $vista->categorias=DB::select($sql_categorias);
        $vista->ultimas_ofertas=DB::select($sql_ultimas_ofertas);
        $vista->ultimas_noticias=DB::select($sql_ultimas_noticias);
        

        return $vista;
    } 
}
