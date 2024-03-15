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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //$table->string('name')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('date_of_birth')->nullable();
            //$table->string('year_of_establishment')->nullable();
            $table->string('address')->nullable();
            $table->text('short_description')->nullable();
            //$table->integer('company_size')->nullable();
            $table->string('portfolio')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate(); //->restrictOnDelete()
            $table->tinyInteger('status')->default(1)->comment("0 = decline, 1 = approved");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
