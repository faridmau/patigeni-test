<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->date('DOB');//date of birth
            $table->string('telepon')->nullable();;
            $table->string('pekerjaan');
            $table->enum('gender',['l','p']);
            $table->string('agama');
            $table->string('status');
            $table->string('foto')->nullable();;
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
        Schema::dropIfExists('residents');
    }
}
