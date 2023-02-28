<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaders', function (Blueprint $table) {
            $table->increments('id_kader');
            $table->integer('id_tugas');
            $table->string('nama_kader', 85);
            $table->enum('jenkel_kader',['laki-laki','perempuan']);
            $table->string('no_hp', 17); 
            $table->string('tempat_lahir', 22);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('email', 30);
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
        Schema::dropIfExists('kaders');
    }
}
