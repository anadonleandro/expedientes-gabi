<?php

namespace sisExpedientes;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='id_persona';

    public $timestamps=false;


    protected $fillable =[
        'fecha_alta',
    	'nombre',
    	'direccion',
    	'dni_tipo',
        'dni_nro',
    	'telefono',
        'movil',
        'fax',
        'email',
        'tipo',
    	'estado'
    ];

    protected $guarded =[

    ];
}
