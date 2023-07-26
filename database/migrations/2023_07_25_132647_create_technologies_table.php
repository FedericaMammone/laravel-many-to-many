<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Questa funzione viene eseguita quando la migrazione viene applicata.
     * Crea la tabella 'technologies' con i relativi campi.
     * La tabella conterrà un campo ID auto-incrementante, un campo 'name' di tipo stringa univoco con lunghezza massima di 32 caratteri,
     * e i campi di timestamp 'created_at' e 'updated_at'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id(); // Crea un campo ID auto-incrementante
            $table->string('name', 32)->unique(); // Crea un campo 'name' di tipo stringa univoco con lunghezza massima di 32 caratteri
            $table->timestamps(); // Crea i campi di timestamp 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * Questa funzione viene eseguita quando la migrazione viene annullata/eliminata (rollback).
     * Elimina la tabella 'technologies', se esiste.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies'); // Elimina la tabella 'technologies' se esiste
    }
};
