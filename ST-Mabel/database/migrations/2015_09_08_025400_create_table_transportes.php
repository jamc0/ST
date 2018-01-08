<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_transporte', 50);
            $table->unsignedInteger('demora');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });
        DB::table('transportes')->insert([
            ['nombre_transporte'=>'Lento Pero Seguro',
            'demora'=>'7',
            'precio'=>'25.00']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportes');
    }
}
