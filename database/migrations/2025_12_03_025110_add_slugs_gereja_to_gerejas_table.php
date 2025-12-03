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
        Schema::table('gerejas', function (Blueprint $table) {
            $table->string('slugs_gereja')->after('name_gereja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gerejas', function (Blueprint $table) {
            $table->dropColumn('slugs_gereja');
        });
    }
};
