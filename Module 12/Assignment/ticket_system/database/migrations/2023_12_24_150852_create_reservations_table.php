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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table-> unsignedBigInteger('customer_id');
            $table-> unsignedBigInteger('bus_id');

            $table->string('location');
            $table->string('destination');
            // $table->timestamp('departure_time');
            $table->date('reservation_date');
            $table->time('reservation_time');

            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('bus_id')->references('id')->on('buses')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
