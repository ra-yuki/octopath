<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOctopathsTable0606 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('octopaths', function (Blueprint $table) {
            $table->renameColumn('links', 'link');
            $table->renameColumn('titles', 'title');
            $table->renameColumn('descriptions', 'description');
            $table->integer('display_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('octopaths', function (Blueprint $table) {
            //
        });
    }
}
