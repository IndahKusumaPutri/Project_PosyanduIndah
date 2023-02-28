<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNimbangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nimbangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_timbang', 12);
            $table->integer('id_pasien');
            $table->date('tgl');
            $table->string('berat', 15);
            $table->string('tinggi', 15);
            $table->text('status_gizi');
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
        Schema::dropIfExists('nimbangs');
    }
}
