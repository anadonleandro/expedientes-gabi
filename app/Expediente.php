<?php

namespace sisExpedientes;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table='expediente';

    protected $primaryKey='id_exp';

    public $timestamps=false;


    protected $fillable =[
    	'id_persona',
    	'fecha_alta',
        'tipo',
        'estado',
        'fecha_cierre',
    	'caratula',
    	'obs',
    	'texto',
        'cuij',
        'nombre_contraria',
        'abogado_contraria'
    ];

    protected $guarded =[

    ];
}
