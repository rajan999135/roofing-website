<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            // Make these fields optional
            if (Schema::hasColumn('testimonials', 'location')) {
                $table->string('location')->nullable()->change();
            }

            if (Schema::hasColumn('testimonials', 'message')) {
                $table->text('message')->nullable()->change();
            }

            if (Schema::hasColumn('testimonials', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            // You can leave this empty or restore old definition if you really want
        });
    }
};
