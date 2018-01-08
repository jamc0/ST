<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_reporte',100);
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('link')->default('');
            $table->timestamps();
        });


         // Insertando Registros en la Tabla Anios
        DB::table('reportes')->insert([
                                ['nombre_reporte' => 'Lista de Usuarios','role_id' => '1','estado_id'=> '1'],
                                ['nombre_reporte' => 'Lista de Usuarios','role_id' => '2','estado_id'=> '1'],
                                ['nombre_reporte' => 'Lista de Ventas','role_id' => '3','estado_id'=> '3'],
                                ['nombre_reporte' => 'Lista de Ventas','role_id' => '4','estado_id'=> '3'],
                               ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
