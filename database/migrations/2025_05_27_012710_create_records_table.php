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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users", "id");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->foreignId("sub_kriteria_id")->nullable()->constrained("sub_kriteria", "id");
            $table->foreignId("response_id")->constrained("responses", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
