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
                        "Total de Registros index" => $cursos->count(),
                        "detalles" => $cursos //!C30.1

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
    public function store(Request $request)
    {
        /*======================================================================================*/
        //!C30 INSERTA REGISTRO CURSOS                                                            
        /*======================================================================================*/

        $token = $request->header('Authorization');
        $clientes = Clientes::all();

        $datos = [];
        $json = [];

        foreach ($clientes as $key => $value) {



            if ("Basic " . base64_encode($value["id_cliente"] . ":" .  $value["llave_secreta"]) == $token) {


                $datos = array(
                    "titulo" => $request->input("titulo"),
                    "descripcion" => $request->input("descripcion"),
                    "instructor" => $request->input("instructor"),
                    "imagen" => $request->input("imagen"),
                    "precio" => $request->input("precio")
                );
                ///////////////////////////////////////////////////////////       

                if (!empty($datos)) //!C30
                {
                    $validator = Validator::make($datos, [
                        'titulo' =>  'required|string|max:255|unique:cursos',
                        'descripcion' =>  'required|string|max:255|unique:cursos',
                        'instructor'  =>  'required|string|max:255',
                        'imagen' =>  'required|string|max:255|unique:cursos',
                        'precio' =>  'required|numeric'


                    ]);

                    if ($validator->fails()) {

                        $json = array(

                            "status" => 404,
                            "detalle " => "registro con errores posible titulo repetido"
                            
                        );
                        return json_encode($json, true);
                    } else {

                        $cursos = new Cursos();
                        $cursos->titulo = $datos["titulo"];
                        $cursos->descripcion = $datos["descripcion"];
                        $cursos->instructor = $datos["instructor"];
                        $cursos->imagen = $datos["imagen"];
                        $cursos->precio = $datos["precio"];
                        $cursos->id_creador = $value["id"];

                        $cursos->save();
                    }
                } else {
                    $json = array(

                        "status" => 404,
                        "detalle " => "registros no pueden estar vacios"

                    );
                    return json_encode($json, true);
                }
               
                $json = array(

                    "status" => 200,
                    "detalle " => "Registro dado de alta"

                );

                return json_encode($json, true);
            }
        }

        return json_encode($json, true);
    }
}
