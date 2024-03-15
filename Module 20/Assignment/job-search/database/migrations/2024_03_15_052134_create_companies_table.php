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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year_of_establishment')->nullable();
            $table->string('address')->nullable();
            $table->text('short_description')->nullable();
            $table->string('company_size')->nullable();
            $table->string('company_type')->nullable();
            $table->string('license_no')->unique();
            $table->string('number')->unique();
            $table->string('url')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('status')->default(1)->comment("0 = decline, 1 = approved");
            // $table->integer('created_by')->nullable();
            // $table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
