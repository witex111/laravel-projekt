<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('odpowiedzi', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pytanie_id');
        $table->string('odpowiedz');
        $table->boolean('czy_poprawna')->default(false);
        $table->timestamps();

        $table->foreign('pytanie_id')
              ->references('id')->on('pytania')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odpowiedzi');
    }
};
