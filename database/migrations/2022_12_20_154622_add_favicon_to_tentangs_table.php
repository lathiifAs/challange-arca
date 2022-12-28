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
        Schema::table('tentangs', function (Blueprint $table) {
            //
            $table->text('favicon_path');
            $table->text('favicon_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tentangs', function (Blueprint $table) {
            //
            $table->dropColumn('favicon_path');
            $table->dropColumn('favicon_name');
        });
    }
};
