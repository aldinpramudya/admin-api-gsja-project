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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("name_event");
            $table->string("slug_event")->unique();
            $table->string("image_banner_event")->nullable();
            $table->string("link_event");
            $table->longText("description_event");
            $table->string("event_date");
            $table->string("event_place");
            $table->string("event_contact");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
