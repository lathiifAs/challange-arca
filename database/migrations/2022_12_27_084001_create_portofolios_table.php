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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal');
            $table->text('desc')->nullable();
            $table->text('img_thumb_path');
            $table->text('img_thumb_name');
            $table->text('img_porto_path');
            $table->text('img_porto_1_name')->nullable();
            $table->text('img_porto_2_name')->nullable();
            $table->text('img_porto_3_name')->nullable();
            $table->text('img_porto_4_name')->nullable();
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
        Schema::dropIfExists('portofolios');
    }
};
