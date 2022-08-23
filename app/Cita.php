<?php

namespace sisExpedientes;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table='cita';

    protected $primaryKey='id_cita';

    public $timestamps=false;


    protected $fillable =[
    	'fecha_cita',
        'hora_cita',
        'texto_cita'
    ];

    protected $guarded =[

    ];
}
