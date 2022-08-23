<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullCalendareventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_calendareventos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechaIni')->nullable();
            $table->datetime('fechaFin')->nullable();
            $table->boolean('todoeldia')->nullable();
            $table->string('color')->nullable();
            $table->mediumText('titulo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('full_calendareventos');
    }
}
