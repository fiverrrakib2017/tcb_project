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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('division_id');
            $table->integer('zila_id');
            $table->integer('upzila_id');
            $table->integer('union_id');
            $table->integer('dealer_id');
            $table->string('month');
            $table->string('year');
            $table->integer('amount');
            $table->integer('status');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')
            // ->on('users')
            // ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
