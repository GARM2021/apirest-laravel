<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cursos;
use App\Models\Clientes;

class CursosController extends Controller
{
    public function index(Request $request)
    {

        /*======================================================================================*/
        //!C29 TOKEN                                                             
        /*======================================================================================*/

        $token = $request->header('Authorization');
        $clientes = Clientes::all();
        $json = array(
            "status" => 405,
            "token" => $token
        );

    
        foreach ($clientes as $key => $value) {



            if ("Basic " . base64_encode($value["id_cliente"] . ":" .  $value["llave_secreta"]) == $token) {

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
                    
                } else {

                    $json = array(

                        "status" => 404,
                        "detalle " => "registro con errores"

                    );
                   
                }
            }

           
        }

        return json_encode($json, true);
        
    }
}
