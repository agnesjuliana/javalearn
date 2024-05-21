<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArtikelTable extends Migration
{
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 100)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->text('konten')->nullable();
            $table->timestamp('tanggal_pembuatan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['draft', 'review', 'published'])->default('draft');
            $table->integer('jumlah_like')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}

