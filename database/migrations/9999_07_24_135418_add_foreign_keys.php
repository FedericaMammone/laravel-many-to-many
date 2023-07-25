<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->foreignId('type_id')->constrained();
        });


        Schema::table('role_user', function (Blueprint $table) {

            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_type_id_foreign');

            $table->dropColumn('type_id');
        });

        Schema::table('role_user', function (Blueprint $table) {

            $table->dropForeign('role_user_role_id_foreign');
            $table->dropForeign('role_user_user_id_foreign');

            $table->dropColumn('role_id');
            $table->dropColumn('user_id');
        });
    }
};
