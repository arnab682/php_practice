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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('superadmin')->default(0); //Super Admin
            $table->tinyInteger('company')->default(0); //Company
            $table->tinyInteger('candidate')->default(0); //Candidate
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->restrictOnDelete()
            ->cascadeOnUpdate(); //->restrictOnDelete()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
