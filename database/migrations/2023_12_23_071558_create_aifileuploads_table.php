<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aifileuploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Change the data type to unsignedBigInteger
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('file_path');
            $table->string('ai_details')->nullable();
            $table->string('ai_type')->nullable();
            $table->string('s3_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aifileuploads');
    }
};
