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
        Schema::create('sending_massages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained("clients")->cascadeOnDelete();
            $table->unsignedInteger('receiver_id')->nullable();
            $table->boolean('status_user')->default(1);
            $table->boolean('status_client')->default(1);
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sending_massages');
    }
};
