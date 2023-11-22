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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('operator' , 20);
            $table->string('coach_no' , 30);
            $table->string('type' , 20);
            $table->string('brand' , 20);
            $table->string('chesis' , 20);
            $table->string('seat' , 20);
            $table->string('bodyrent' , 20);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
