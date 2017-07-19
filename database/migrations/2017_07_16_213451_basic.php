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

        
        Schema::dropIfExists('compras');
        
        Schema::dropIfExists('transacciones');
        
        Schema::dropIfExists('salida_detalles');
        
        Schema::dropIfExists('salidas');
        
        Schema::dropIfExists('entradas');
        
        Schema::dropIfExists('vendedores');
        // SUNAT
        
        Schema::dropIfExists('vendedores');
        Schema::create('vendedores', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // EMPRESA
            $table->string('pais');
            $table->string('region');
            $table->string('codigo_postal', 10);
            $table->string('direccion');
            $table->string('ruc');
            $table->string('RAZON SOCIAL', 500);

            // PRINCIPAL RESPONSABLE
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('dni', 10);
            $table->string('key_token')->nullable();
        });
        

        // VENDEDOR
        Schema::dropIfExists('entradas');
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
        Schema::dropIfExists('salidas');
        Schema::create('salidas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('tipo_comprobante', 20)->nullable(); // en constantes.php
            $table->char('numero_boleta', 15)->nullable(); // static

            $table->integer('vendedores_id')->unsigned();
            $table->foreign('vendedores_id')->references('id')->on('vendedores');
        });
        Schema::dropIfExists('salida_detalles');
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

        
        // CLIENTE
        Schema::dropIfExists('transacciones');
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('pais');
            $table->string('region');
            $table->string('codigo_postal', 10);
            $table->string('direccion');
            $table->string('nombre');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            // $table->string('total_pagado')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            
        });
        Schema::dropIfExists('compras');
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->integer('cantidad')->unsigned()->default(1);
            $table->integer('entradas_id')->unsigned();
            $table->foreign('entradas_id')->references('id')->on('entradas');
            $table->integer('transacciones_id')->unsigned();
            $table->foreign('transacciones_id')->references('id')->on('transacciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('compras');
        
        Schema::dropIfExists('transacciones');
        
        Schema::dropIfExists('salida_detalles');
        
        Schema::dropIfExists('salidas');
        
        Schema::dropIfExists('entradas');
        
        Schema::dropIfExists('vendedores');
        
    }
}
