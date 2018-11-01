<?php

namespace App\Http\Controllers;

use DB;

class con_gral extends Controller
{
    public function getLocalidades($id_provincia)
    {
        $localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$id_provincia]);

        if ($localidades) {
            echo json_encode([
                "status"      => 1,
                "localidades" => $localidades,
            ]);
        } else {
            echo json_encode([
                "status" => 2,
            ]);
        }
    }

    public function getSectores($id_area)
    {
        $sectores = DB::select("SELECT * FROM tbl_areas_sectores WHERE id_area=?", [$id_area]);

        if ($sectores) {
            echo json_encode([
                "status"   => 1,
                "sectores" => $sectores,
            ]);
        } else {
            echo json_encode([
                "status" => 2,
            ]);
        }
    }
}
