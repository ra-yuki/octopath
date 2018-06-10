<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullifyFolderId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('octopath_meta_datasets', function (Blueprint $table) {
            $table->integer('folder_id')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
            $table->dropColumn('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('octopath_meta_datasets', function (Blueprint $table) {
            //
        });
    }
}
