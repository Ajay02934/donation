<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', fn (Blueprint $t) => $t->boolean('is_admin')->default(false)->after('email'));
        }
        if (!Schema::hasTable('puja_categories')) {
            Schema::create('puja_categories', function (Blueprint $t) { $t->id(); $t->string('name'); $t->string('slug')->unique(); $t->text('description')->nullable(); $t->timestamps(); });
        }
        if (!Schema::hasTable('pujas')) {
            Schema::create('pujas', function (Blueprint $t) { $t->id(); $t->foreignId('puja_category_id')->nullable()->constrained()->nullOnDelete(); $t->string('name'); $t->string('slug')->unique(); $t->string('image')->nullable(); $t->text('excerpt'); $t->longText('description'); $t->json('benefits')->nullable(); $t->json('samagri')->nullable(); $t->string('duration'); $t->decimal('price', 10, 2); $t->string('location')->default('At your home or temple'); $t->boolean('is_featured')->default(false); $t->softDeletes(); $t->timestamps(); });
        }
        if (!Schema::hasTable('booking_slots')) {
            Schema::create('booking_slots', function (Blueprint $t) { $t->id(); $t->foreignId('puja_id')->constrained()->cascadeOnDelete(); $t->date('slot_date'); $t->time('start_time'); $t->time('end_time')->nullable(); $t->unsignedInteger('capacity')->default(1); $t->unsignedInteger('reserved_count')->default(0); $t->boolean('is_active')->default(true); $t->timestamps(); $t->unique(['puja_id','slot_date','start_time']); });
        }
        if (!Schema::hasTable('puja_bookings')) {
            Schema::create('puja_bookings', function (Blueprint $t) { $t->id(); $t->string('booking_number')->unique(); $t->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); $t->foreignId('puja_id')->constrained()->restrictOnDelete(); $t->foreignId('booking_slot_id')->nullable()->constrained()->nullOnDelete(); $t->string('name'); $t->string('email'); $t->string('mobile',20); $t->date('birth_date')->nullable(); $t->time('birth_time')->nullable(); $t->string('birth_place')->nullable(); $t->text('address'); $t->unsignedInteger('people_count')->default(1); $t->string('puja_location'); $t->text('special_requirements')->nullable(); $t->text('message')->nullable(); $t->decimal('amount',10,2); $t->string('status')->default('pending')->index(); $t->timestamp('reserved_until')->nullable(); $t->timestamps(); });
        }
        if (!Schema::hasTable('astrologers')) {
            Schema::create('astrologers', function (Blueprint $t) { $t->id(); $t->string('name'); $t->string('slug')->unique(); $t->string('photo')->nullable(); $t->unsignedSmallInteger('experience_years'); $t->string('specialization'); $t->string('languages'); $t->decimal('rating',2,1)->default(5); $t->decimal('consultation_fee',10,2); $t->string('availability')->nullable(); $t->text('bio')->nullable(); $t->softDeletes(); $t->timestamps(); });
        }
        if (!Schema::hasTable('astrology_services')) {
            Schema::create('astrology_services', function (Blueprint $t) { $t->id(); $t->string('name'); $t->string('slug')->unique(); $t->text('description'); $t->json('benefits')->nullable(); $t->decimal('price',10,2); $t->string('duration'); $t->timestamps(); });
        }
        if (!Schema::hasTable('consultations')) {
            Schema::create('consultations', function (Blueprint $t) { $t->id(); $t->foreignId('user_id')->constrained()->cascadeOnDelete(); $t->foreignId('astrologer_id')->constrained()->restrictOnDelete(); $t->foreignId('astrology_service_id')->constrained()->restrictOnDelete(); $t->dateTime('scheduled_at'); $t->string('status')->default('pending'); $t->decimal('amount',10,2); $t->text('notes')->nullable(); $t->timestamps(); });
        }
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $t) { $t->id(); $t->morphs('payable'); $t->string('gateway')->default('razorpay'); $t->string('gateway_order_id')->nullable()->unique(); $t->string('gateway_payment_id')->nullable()->unique(); $t->decimal('amount',10,2); $t->string('currency',3)->default('INR'); $t->string('status')->default('pending')->index(); $t->json('payload')->nullable(); $t->timestamps(); });
        }
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $t) { $t->id(); $t->string('name'); $t->string('city')->nullable(); $t->text('quote'); $t->unsignedTinyInteger('rating')->default(5); $t->boolean('is_published')->default(true); $t->timestamps(); });
        }
        if (!Schema::hasTable('faqs')) {
            Schema::create('faqs', function (Blueprint $t) { $t->id(); $t->string('question'); $t->text('answer'); $t->unsignedInteger('sort_order')->default(0); $t->boolean('is_published')->default(true); $t->timestamps(); });
        }
        if (!Schema::hasTable('contact_messages')) {
            Schema::create('contact_messages', function (Blueprint $t) { $t->id(); $t->string('name'); $t->string('email'); $t->string('mobile',20)->nullable(); $t->string('subject')->nullable(); $t->text('message'); $t->timestamp('read_at')->nullable(); $t->timestamps(); });
        }
    }
    public function down(): void { Schema::dropIfExists('contact_messages'); Schema::dropIfExists('faqs'); Schema::dropIfExists('testimonials'); Schema::dropIfExists('payments'); Schema::dropIfExists('consultations'); Schema::dropIfExists('astrology_services'); Schema::dropIfExists('astrologers'); Schema::dropIfExists('puja_bookings'); Schema::dropIfExists('booking_slots'); Schema::dropIfExists('pujas'); Schema::dropIfExists('puja_categories'); Schema::table('users', fn(Blueprint $t) => $t->dropColumn('is_admin')); }
};
