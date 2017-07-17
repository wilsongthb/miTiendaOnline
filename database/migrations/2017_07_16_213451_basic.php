<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Basic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');            
            
            $table->string('nombre');
            $table->string('palabras_clave');
            $table->string('metadatos', 500);
            $table->text('descripcion')->nullable();
            $table->float('precio', 10, 2)->nullable()->default(0); // precio por unidad
            $table->integer('cantidad')->unsigned()->default(1);
            $table->string('image_url')->nullable();
            $table->string('images', 500)->nullable();
            
        });

        
        Schema::create('salidas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('tipoDeComprobante', 20); // en constantes.php
            $table->char('numero_boleta', 15); // static


        });
        
        Schema::create('salida_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('cantidad')->unsigned()->default(1);
            $table->integer('salidas_id')->unsigned();
            $table->foreign('salidas_id')->references('id')->on('salidas');
            $table->integer('entradas_id')->unsigned();
            $table->foreign('entradas_id')->references('id')->on('entradas');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('salida_detalles');
        Schema::dropIfExists('salidas');
        Schema::dropIfExists('entradas');
        
    }
}
