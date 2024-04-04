<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->String('nom');
            $table->String('description');
            $table->String('prix');
            $table->String('photo')->nullable();
            $table->String('supprimer')->default(0);
            $table->String('etat')->default(0);
            $table->unsignedBigInteger('restaurant_id')->default(0);
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plats');
    }
};
