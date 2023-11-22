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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('firstname' , 20);
            $table->string('lastname' , 20);
            $table->string('email', 30)->unique();
            $table->string('phone' , 11);
            $table->text('prsentaddress' , 20);
            $table->text('permanentaddress' , 20);
            $table->string('password');
            $table->enum('gender',["Male","Female"]);
            $table->string('bg' , 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
