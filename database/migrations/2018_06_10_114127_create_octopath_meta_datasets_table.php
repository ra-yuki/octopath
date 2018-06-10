<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOctopathMetaDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('octopath_meta_datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('octopath');
            $table->string('title');
            $table->integer('folder_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->date('retention_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('octopath_meta_datasets');
    }
}
