<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupom', function (Blueprint $table) {
            $table->id();
            $table->date('dataRetirada');
            $table->date('dataDisp');
            $table->date('dataLimite');  
            $table->string('status');
            $table->foreignId('idBeneficiado')->references('id')->on('beneficiado')->onDelete('cascade');
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
        Schema::dropIfExists('_table__cupom');
    }
};
