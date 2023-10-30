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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('image')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->integer('license_no');
            $table->date('nepali_dob');
            $table->date('english_dob');
            $table->string('department');
            $table->string('specialization');
            $table->enum('gender',['male','female','others']);
            $table->string('contact');
            $table->string('province');
            $table->string('district');
            $table->string('municipality');
            $table->integer('ward');
            $table->string('city');
            $table->string('tole')->nullable();
            $table->string('role');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('doctors');
    }
};
