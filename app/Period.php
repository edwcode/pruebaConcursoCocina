<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'period';
    public static function getComboPeriod()
    {
        $rols = self::pluck('nombre_concurso','id')->toArray();
        
        return array('' => '- Seleccione un concurso -') + $rols;
    }

    public function PeriodUser()
    {
        return $this->hasMany('App\User','period_id');
    }
}
