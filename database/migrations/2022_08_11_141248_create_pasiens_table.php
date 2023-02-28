<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->string('NIB', 12);
            $table->string('nama_pasien', 85);
            $table->enum('jenkel',['laki-laki','perempuan']);
            $table->string('tempat_lahir', 22);
            $table->date('tanggal_lahir');
            $table->string('usia', 12);
            $table->integer('id_ibu');
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
        Schema::dropIfExists('pasiens');
    }
}
