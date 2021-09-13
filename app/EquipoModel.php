<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CentroFormacionModel;

class EquipoModel extends Model
{
    protected $table = "equipos";

    public function centro_formacion(){

        return $this->belongsTo('App\CentroFormacionModel', 'id_centro_formacion', 'id_centro_formacion');

    }    
    
}

