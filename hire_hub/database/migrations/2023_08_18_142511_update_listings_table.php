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
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->string('country');
            $table->string('category');
            $table->string('type');
            $table->string('experience');
            $table->date('closing_date');
            $table->text('job_description');
            
            // Drop the existing columns
            $table->dropColumn(['company', 'location', 'logo', 'is_highlighted', 'content', 'apply_link']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->dropColumn(['country', 'category', 'type', 'experience', 'closing_date', 'job_description', 'company_id']);
            $table->string('company');
            $table->string('location');
            $table->string('logo')->nullable();
            $table->boolean('is_highlighted')->default(false);
            $table->text('content');
            $table->string('apply_link');
        });
    }
};
