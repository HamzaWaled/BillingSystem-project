<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomSociet√©');
            $table->string('AdresseSociet√©');
            $table->string('IceSociet√©');
            $table->bigInteger('NumeroFacture');
            $table->date('DateFacture');
            $table->decimal('MontantHT20')->nullable()->default(0.00);
            $table->decimal('MontantHT7')->nullable()->default(0.00);
            $table->decimal('TotalHT')->default(0.00);
            $table->decimal('MontantTVA20')->default(0.00);
            $table->decimal('MontantTVA7')->default(0.00);
            $table->decimal('TotalTVA')->default(0.00);
            $table->decimal('TotalTTC')->default(0.00);
            
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
        Schema::dropIfExists('bills');
    }
}
