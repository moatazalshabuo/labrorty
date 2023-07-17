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
        Schema::create('test_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cgt_id")->constrained('client_group_tests');
            $table->foreignId("test_id")->constrained("tests");
            $table->float("result")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_clients');
    }
};
