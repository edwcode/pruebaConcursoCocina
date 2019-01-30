<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';

    public static function getComboRols()
    {
        $rols = self::pluck('name','id')->toArray();
        
        return array('' => '- Seleccione un Rol -') + $rols;
    }
}
