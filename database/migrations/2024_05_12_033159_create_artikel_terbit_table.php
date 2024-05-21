<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArtikelTerbitTable extends Migration
{
    public function up()
    {
        Schema::create('artikel_terbit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_artikel');
            $table->string('penerbit', 100);
            $table->timestamp('tanggal_terbit')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('id_artikel')->references('id')->on('artikel')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel_terbit');
    }
}
