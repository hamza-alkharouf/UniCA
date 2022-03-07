<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type_username_id')->unique();
            $table->string('name')->unique();
            $table->enum('type', ['student', 'university', 'headDepartment', 'deanDepartment', 'academicVice', 'super-admin'])->default('student');
            $table->string('email')->unique();
            $table->string('password');

            $table->foreignId('role_id')
            ->nullable()
            ->constrained('roles','id')
            ->nullOnDelete();
      
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
