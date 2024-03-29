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
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('zila_id');
            $table->unsignedBigInteger('upzila_id');
            $table->unsignedBigInteger('union_id');
            $table->unsignedBigInteger('dealer_id');
            $table->string('month');
            $table->string('year');
            $table->integer('amount');
            $table->integer('status');
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

            $table->foreign('dealer_id')->references('id')
                ->on('dealers')
                ->onDelete('cascade');

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
