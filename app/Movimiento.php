<?php

namespace sisExpedientes;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table='movimiento';

    protected $primaryKey='id_mov';

    public $timestamps=false;


    protected $fillable =[
    	'id_exp',
    	'fecha_mov',
    	'destino_mov',
    	'obs_mov',
    	'texto_mov',
    	'estado_mov'
    ];

    protected $guarded =[

    ];
}
