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
        Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('beneficiary_id');
            $table->tinyInteger('status')->default(0); // 0=not distributed, 1=distributed
            $table->date('distribution_date')->nullable();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('zila_id');
            $table->unsignedBigInteger('upozila_id');
            $table->unsignedBigInteger('union_id');
            $table->integer('ward_id');
            $table->timestamps();

            $table->foreign('beneficiary_id')
                ->references('id')
                ->on('beneficiaries')
                ->onDelete('cascade');

                $table->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');

            $table->foreign('zila_id')
            ->references('id')
                ->on('zilas')
                ->onDelete('cascade');

            $table->foreign('upozila_id')
            ->references('id')
                ->on('upozilas')
                ->onDelete('cascade');

            $table->foreign('union_id')
            ->references('id')
                ->on('unions')
                ->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributions');
    }
};
