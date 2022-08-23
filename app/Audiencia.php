<?php

namespace sisExpedientes;

use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
    protected $table='audiencia';

    protected $primaryKey='id_audi';

    public $timestamps=false;


    protected $fillable =[
    	'id_exp',
    	'id_persona',
        'tipo',
        'fecha_audi',
    	'texto_audi',
    	'obs_audi'
    ];

    protected $guarded =[

    ];
}
