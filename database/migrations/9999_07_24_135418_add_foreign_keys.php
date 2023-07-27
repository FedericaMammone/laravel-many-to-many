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
     * Aggiunge due colonne alla tabella 'projects': 'type_id' e 'technology_id' come Foreign Key.
     * Entrambe le colonne sono collegate ai rispettivi Foreign Key nelle tabelle 'types' e 'technologies'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->foreignId('type_id')->constrained(); // Aggiunge la colonna 'type_id' come Foreign Key
        });

        Schema::table('project_technology', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained(); // Aggiunge la colonna 'project_id' come Foreign Key
            $table->foreignId('technology_id')->constrained(); // Aggiunge la colonna 'technology_id' come Foreign Key
        });
    }

    /**
     * Reverse the migrations.
     *
     * Questa funzione viene eseguita quando la migrazione viene annullata/eliminata (rollback).
     * Rimuove le colonne 'type_id' e 'technology_id' dalla tabella 'projects', se esistono.
     * Rimuove anche le colonne 'project_id' e 'technology_id' dalla tabella 'project_technology', se esistono.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_type_id_foreign'); // Rimuove il vincolo della Foreign Key
            $table->dropColumn('type_id'); // Rimuove la colonna 'type_id'
        });

        Schema::table('project_technology', function (Blueprint $table) {
            $table->dropForeign('project_technology_project_id_foreign'); // Rimuove il vincolo della Foreign Key
            $table->dropForeign('project_technology_technology_id_foreign'); // Rimuove il vincolo della Foreign Key

            $table->dropColumn('project_id'); // Rimuove la colonna 'project_id'
            $table->dropColumn('technology_id'); // Rimuove la colonna 'technology_id'
        });
    }
};
