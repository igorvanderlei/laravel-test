<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->bigIncrements('id');
	    $table->string('titulo');
	    $table->text('texto');
	    $table->boolean('lido')->default(false);
	    $table->bigInteger('funcionario_id');
	    $table->bigInteger('destinatario_id');
            $table->timestamps();

	    $table->foreign('funcionario_id')->references('id')->on('funcionarios');
	    $table->foreign('destinatario_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagems');
    }
}
