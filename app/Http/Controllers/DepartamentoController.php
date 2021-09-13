<?php

namespace App\Http\Controllers;

use App\DepartamentoModel;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index(){

        $departamentos = DepartamentoModel::all();
        
        return $departamentos;
        
    }
}
