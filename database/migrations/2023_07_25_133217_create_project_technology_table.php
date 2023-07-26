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
     * Creerà la tabella 'project_technology' con un campo ID auto-incrementante.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id(); // Crea un campo ID auto-incrementante
        });
    }

    /**
     * Reverse the migrations.
     *
     * Questa funzione viene eseguita quando la migrazione viene annullata/eliminata (rollback).
     * Elimina la tabella 'project_technology', se esiste.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology'); // Elimina la tabella 'project_technology' se esiste
    }
};
