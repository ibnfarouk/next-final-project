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
        Schema::create('postables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->morphs('postable');// _id  -   _type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
