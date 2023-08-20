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
        Schema::table('clicks', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            
            // Define foreign key constraint
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clicks', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['candidate_id']);
            
            // Remove the column
            $table->dropColumn('candidate_id');
        });
    }
};
