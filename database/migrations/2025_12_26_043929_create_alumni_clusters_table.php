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
        Schema::create('alumni_clusters', function (Blueprint $table) {
            $table->id();

            $table->string('nis_alumni', 20)->unique();

            $table->foreign('nis_alumni')->references('nis')->on('alumnis')->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('cluster_id'); // 0,1,2
            $table->string('cluster_label'); // Nama cluster
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_clusters');
    }
};
