<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_perusahaan');
            $table->string('judul_pekerjaan');
            $table->string('alamat');
            $table->string('gaji');
            $table->string('waktu_bekerja');
            $table->text('deskripsi')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('nama_perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
