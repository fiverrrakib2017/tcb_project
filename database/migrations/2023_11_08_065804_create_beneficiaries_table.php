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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('nid');
            $table->text('phone_number');
            // $table->text('photo');
            $table->text('card_no');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('zila_id');
            $table->unsignedBigInteger('upozila_id');
            $table->unsignedBigInteger('union_id'); 
            $table->unsignedBigInteger('vatar_id'); 
            $table->unsignedBigInteger('dealer_id'); 
            $table->unsignedBigInteger('village_id');
            $table->integer('ward_id');
           
            $table->timestamps();
            $table->integer('status')->comment('1=received,2=hold');

            $table->foreign('division_id')->references('id')
            ->on('divisions')
            ->onDelete('cascade');

        $table->foreign('zila_id')->references('id')
            ->on('zilas')
            ->onDelete('cascade');

        $table->foreign('upozila_id')->references('id')
            ->on('upozilas')
            ->onDelete('cascade');

        $table->foreign('union_id')->references('id')
            ->on('unions')
            ->onDelete('cascade');


        $table->foreign('vatar_id')->references('id')
            ->on('vatars')
            ->onDelete('cascade');

        $table->foreign('dealer_id')->references('id')
            ->on('dealers')
            ->onDelete('cascade');

        $table->foreign('village_id')->references('id')
            ->on('villages')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
