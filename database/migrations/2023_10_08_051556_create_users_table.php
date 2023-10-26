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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('user_type')->comment('1: Admin, 2: Division, 3: Zila, 4: Upzila, 5: Union, 6:Dealer');
            $table->rememberToken();
            $table->timestamps();



            // $table->foreign('division_id')->references('id')
            //     ->on('divisions')
            //     ->onDelete('cascade');

            // $table->foreign('zila_id')->references('id')
            //     ->on('zilas')
            //     ->onDelete('cascade');

            // $table->foreign('upozila_id')->references('id')
            //     ->on('upozilas')
            //     ->onDelete('cascade');

            // $table->foreign('union_id')->references('id')
            //     ->on('unions')
            //     ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
