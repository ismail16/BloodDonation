<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(2);
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('photo')->nullable();
            $table->string('blood_group');
            $table->string('date_of_birth');
            $table->string('division_id');
            $table->string('district_id');
            $table->string('thana_id');
            $table->string('donate_date')->nullable();
            $table->text('disease')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
