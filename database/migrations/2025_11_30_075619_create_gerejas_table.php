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
        Schema::create('gerejas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pendeta_id");
            $table->foreign("pendeta_id")->references("id")->on("pendetas")->onDelete("cascade");
            $table->string("name_gereja");
            $table->string("image_gereja")->nullable();
            $table->string("address_gereja");
            $table->string("numberphone_gereja");
            $table->string("email_gereja");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerejas');
    }
};
