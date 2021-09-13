<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CiudadModel;
use App\DepartamentoModel;

class CiudadController extends Controller
{
    public function index(){

        $ciudades = CiudadModel::all();
        $departamentos = DepartamentoModel::all();

        $cadena = "[{<br>";
        foreach ($departamentos as $departamento){

            $cadena = $cadena.'"value": "'.$departamento['idDepartamento'].
            '",<br>"label": "'.$departamento['DepNombre'].'",<br>"municipios": [';

            foreach($ciudades as $ciudad){

                if($departamento['idDepartamento'] == $ciudad['idDepartamento']){

                    $cadena = $cadena.'{"value": "'.$ciudad['idCiudad'].'", "label": "'.$ciudad['CiuNombre'].'"},<br>';                
                
                }

            }

            //$cadena = substr($cadena, 0, -1);

            $cadena = $cadena."]<br>},<br>{<br>";

        }
        $cadena = $cadena."}]";

        
        return $cadena;

        return view('paginas.departamentos_ciudades', array("cadena" => $cadena));
         
    }
}
