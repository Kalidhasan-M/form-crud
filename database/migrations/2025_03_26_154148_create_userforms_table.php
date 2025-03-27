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
        Schema::create('userforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contactno'); // Change from integer to string
            $table->string('adhar')->unique();
            $table->string('state');
            $table->string('project');
            $table->string('language');
            $table->string('pincode'); // Change from integer to string
            $table->string('address');
            $table->string('pancart')->unique();
            $table->string('image')->nullable(); // Change from binary to string
            $table->string('resume')->nullable(); // Change from binary to string
            $table->string('gender');
            $table->string('data_of_brth'); // Change from integer to date
            $table->string('age');
            $table->timestamps();
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
