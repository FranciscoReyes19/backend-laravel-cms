<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        
    public function up()
    {
        //
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('personal_id');
            $table->string('nombre_personal');
            $table->enum('type', ['empleado','supervisor'])->default('empleado');
            $table->string('apellido_personal');
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
        //
        Schema::drop('personal');
    }
}

