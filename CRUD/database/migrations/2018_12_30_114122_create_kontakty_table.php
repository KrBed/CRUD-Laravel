<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('firma');
            $table->string('oddzial');
            $table->string('dzial')->nullable();
            $table->string('stanowisko')->nullable();            
            $table->string('telefonStacjonarny')->nullable();
            $table->string('telefonKomorkowy')->nullable();
            $table->string('email')->nullable();          
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
        Schema::dropIfExists('kontakty');
    }
}
