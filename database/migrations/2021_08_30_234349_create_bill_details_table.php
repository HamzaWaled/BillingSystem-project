<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_invoice')->unsigned();
            $table->foreign('id_invoice')->references('id')->on('bills')->onDelete('cascade');




            $table->string('NomArticle');
            $table->integer('Quantité');
            $table->integer('TVA');
            $table->decimal('PrixUnitaireTTC');
            $table->decimal('TotalUnit');
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
        Schema::dropIfExists('bill_details');
    }
}
