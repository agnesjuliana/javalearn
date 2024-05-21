<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArtikelTinjauTable extends Migration
{
    public function up()
    {
        Schema::create('artikel_tinjau', function (Blueprint $table) {
            $table->increments('id_tinjau');
            $table->unsignedInteger('id_artikel');
            $table->timestamp('tanggal_tinjau')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('reviewer', 100)->nullable();
            $table->text('komentar')->nullable();

            $table->foreign('id_artikel')->references('id')->on('artikel');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel_tinjau');
    }
}