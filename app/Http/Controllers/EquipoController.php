<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EquipoModel;

use App\CentroFormacionModel;

class EquipoController extends Controller
{
    
    public function index(){//Realiza consulta a la tabla

        $equipos = EquipoModel::all();//SELECT * FROM equipos

        return view("paginas.equipos_vista", array("equipos" => $equipos));

    }

    public function show($idEquipo){//Consulta con el where

        $equipo = EquipoModel::where("idEquipo", $idEquipo)->get();

        if(count($equipo) != 0){
            //Para obtener los centros de formación debo hacer una consulta a la bd
            $centrosFormacion = CentroFormacionModel::all();//SELECT * FROM centros_formacion

            return view("paginas.editarEquipo", array(
                "equipo" => $equipo,
                "centrosFormacion" => $centrosFormacion
            ));

        }else{

            return view("paginas.editarEquipo", array("estatus" => 404));

        }


    }

    public function update($idEquipo, Request $request){//Actualiza la tabla

        $datos = array(

            "nombreEquipo"          => $request->input('nombreEquipo'),//$_POST['nombreEquipo]
            "id_centro_formacion"   => $request->input('id_centro_formacion'),
            "generoEquipo"          => $request->input('generoEquipo'),
            "equipoActivo"          => $request->input('equipoActivo')

        );

        if(!empty($datos)){//El signo de admiración NIEGA la sentencia

            $equipo = EquipoModel::where('idEquipo', $idEquipo)->update($datos);

            return redirect("/equipos");//header("Location:vista.php");

        }

    }

    public function buscarEquipo($texto, Request $request){

        if($request->ajax()){

            if($texto === '-'){

                $equipos = EquipoModel::join('centros_formacion', 'equipos.id_centro_formacion', '=', 'centros_formacion.id_centro_formacion')->get();

                return $equipos;

            }else{

                $equipos = EquipoModel::where('nombreEquipo', 'like', '%'.$texto.'%')->join('centros_formacion', 'equipos.id_centro_formacion', '=', 'centros_formacion.id_centro_formacion')->get();

                return $equipos;

            }      
        }

    }









    // public function update($idEquipo, Request $request){

    //     $datos = array(
    //         "nombreEquipo"          =>  $request->input('nombreEquipo'),
    //         "id_centro_formacion"   => $request->input('id_centro_formacion'),
    //         "generoEquipo"          => $request->input('generoEquipo'),
    //         "equipoActivo"          => $request->input('equipoActivo')
    //     );

    //     if(!empty($datos)){
            
    //         $equipo = EquipoModel::where('idEquipo', $idEquipo)->update($datos);

    //         return redirect("/equipos");

    //     }

    // }



}
