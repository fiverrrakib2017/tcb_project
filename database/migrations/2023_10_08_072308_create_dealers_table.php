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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone_number');
            $table->string('card_no_start')->nullable();
            $table->string('card_no_end')->nullable();
            $table->string('nid_no')->nullable();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('zila_id');
            $table->unsignedBigInteger('upzila_id');
            $table->unsignedBigInteger('union_id');
            $table->timestamps();

            $table->foreign('division_id')->references('id')
                ->on('divisions')
                ->onDelete('cascade');

            $table->foreign('zila_id')->references('id')
                ->on('zilas')
                ->onDelete('cascade');

            $table->foreign('upzila_id')->references('id')
                ->on('upozilas')
                ->onDelete('cascade');

            $table->foreign('union_id')->references('id')
                ->on('unions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
