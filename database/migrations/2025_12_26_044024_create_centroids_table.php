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
        Schema::create('centroids', function (Blueprint $table) {
            $table->id();

            $table->integer('cluster_id'); // 0,1,2
            $table->string('cluster_label'); 
            $table->json('values'); // simpan array centroid

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centroids');
    }
};
