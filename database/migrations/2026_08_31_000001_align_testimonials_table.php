<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            // Rename old column names to what the app expects
            if (Schema::hasColumn('testimonials', 'customer_name') && !Schema::hasColumn('testimonials', 'name')) {
                $table->renameColumn('customer_name', 'name');
            }
            if (Schema::hasColumn('testimonials', 'location') && !Schema::hasColumn('testimonials', 'city')) {
                $table->renameColumn('location', 'city');
            }
            if (Schema::hasColumn('testimonials', 'testimonial') && !Schema::hasColumn('testimonials', 'quote')) {
                $table->renameColumn('testimonial', 'quote');
            }

            // Add missing columns
            if (!Schema::hasColumn('testimonials', 'is_published')) {
                // Default to published=true for any existing rows that had status='active' or similar
                $table->boolean('is_published')->default(true)->after('rating');
            }
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'name') && !Schema::hasColumn('testimonials', 'customer_name')) {
                $table->renameColumn('name', 'customer_name');
            }
            if (Schema::hasColumn('testimonials', 'city') && !Schema::hasColumn('testimonials', 'location')) {
                $table->renameColumn('city', 'location');
            }
            if (Schema::hasColumn('testimonials', 'quote') && !Schema::hasColumn('testimonials', 'testimonial')) {
                $table->renameColumn('quote', 'testimonial');
            }
            if (Schema::hasColumn('testimonials', 'is_published')) {
                $table->dropColumn('is_published');
            }
        });
    }
};
