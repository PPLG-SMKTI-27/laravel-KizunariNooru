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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('category')->nullable()->after('description');
            $table->text('challenge')->nullable()->after('category');
            $table->text('solution')->nullable()->after('challenge');
            $table->text('result')->nullable()->after('solution');
            $table->json('features')->nullable()->after('result');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['category', 'challenge', 'solution', 'result', 'features']);
        });
    }
};
