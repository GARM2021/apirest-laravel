<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cursos;

class CursosController extends Controller
{
    public function index()
    {
        /*======================================================================================*/
        //!C28 Muestra todos los registros                                                             
        /*======================================================================================*/

        $cursos = Cursos::all();

        if (!empty($cursos)) {
            $json = array(
                "status" => 200,
                "Total de Registros " => $cursos->count(),
                "Detalles :" => $cursos

            );
            return json_encode($json, true);
        } else {

            $json = array(

                "status" => 404,
                "detalle " => "registro con errores"

            );

            return json_encode($json, true);
        }
    }
}
