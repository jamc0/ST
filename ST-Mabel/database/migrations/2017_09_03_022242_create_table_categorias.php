<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_categoria', 50);
            $table->string('descripcion', 250);
            $table->timestamps();
        });
        DB::table('categorias')->insert([
                [
                'nombre_categoria' => 'Informatica',
                'descripcion' => 'Hardware y Software'
                ],
                ['nombre_categoria' => 'Ropa',
                'descripcion' => 'Prendas de Vestir y derivados'
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
