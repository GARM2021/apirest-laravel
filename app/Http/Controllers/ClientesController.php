<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; //! C26
use App\Models\Clientes; //! C27

class ClientesController extends Controller
{


    public function index()
    {
        $json = array(
            "detalle" => "no encontrado"
        );

        echo json_encode($json, true); //! C22 convierte array a json_decode //convierte un jason en array 



    }

    /*======================================================================================*/
    //! Crear un registro                                                             
    /*======================================================================================*/

    public function store(Request $request)
    {
        //      $datos =   array("primer_nombre"=>$request->input("primer_nombre"));
        //     // echo '<pre>'; print_r($datos); echo '</pre>';
        $datos = array("primer_nombre" => $request->input("primer_nombre"), "primer_apellido" => $request->input("primer_apellido"), "email" => $request->input("email"));  //! C24
        //  echo '<pre>'; print_r($datos); echo '</pre>';

        //! C25
        $validator = Validator::make($datos, [
            'primer_nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'email' => 'required|string|email|unique:clientes'

        ]);
        //! C25
        if ($validator->fails()) {

            $json = array(
                "detalle" => "Registro no validos"
            );
            return json_encode($json, true);
        } else {
            $id_cliente = Hash::make($datos["primer_nombre"] . $datos["primer_apellido"] . $datos["email"]); //! C26
            $llave_secreta = Hash::make($datos["email"] . $datos["primer_apellido"] . $datos["primer_nombre"], ["rounds" => 12]); //! C26

            $clientes = new Clientes(); //!C27

            $clientes->primer_nombre = $datos["primer_nombre"];

            $clientes->primer_apellido = $datos["primer_apellido"];
            $clientes->primer_apellido = $datos["primer_apellido"];
            $clientes->email = $datos["email"];
            $clientes->id_cliente = $id_cliente;
            $clientes->llave_secreta = $llave_secreta;





            echo '<pre>';
            print_r($id_cliente);
            echo '</pre>';
            echo '<pre>';
            print_r($clientes->email);
            echo '</pre>';
            echo '<pre>';
            print_r($llave_secreta);
            echo '</pre>';
        }
    }
}