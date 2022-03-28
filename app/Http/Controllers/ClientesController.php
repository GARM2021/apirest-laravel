<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    

   public function index()
   {
       $json = array (
           "detalle"=>"no encontrado"
       );

       echo json_encode($json, true);//! C22 convierte array a json_decode //convierte un jason en array 

 
   
    }

     /*======================================================================================*/
                          //! Crear un registro                                                             
     /*======================================================================================*/

      public function store(Request $request)
      {
    //      $datos =   array("primer_nombre"=>$request->input("primer_nombre"));
    //     // echo '<pre>'; print_r($datos); echo '</pre>';
        $datos = array("primer_nombre"=>$request->input("primer_nombre"));  //! C24
         echo '<pre>'; print_r($datos); echo '</pre>';
       
      }
}
