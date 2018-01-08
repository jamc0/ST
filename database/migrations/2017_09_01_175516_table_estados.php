<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Creando la Tabla : estados.

        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_estado',50);
            $table->timestamps();
        });

        // Insertando los Registros.

        DB::table('estados')->insert([
                                        ['nombre_estado' => 'Activo'],
                                        ['nombre_estado' => 'Inactivo'],
                                    ]);
    


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
