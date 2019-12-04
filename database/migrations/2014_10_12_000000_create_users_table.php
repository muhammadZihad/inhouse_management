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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('isAdmin')->default(0);
            $table->text('home_address');
            $table->text('phone');
            $table->text('national_id');
            $table->string('gender');
            $table->string('type');
            $table->string('image')->nullable();
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->integer('amount_id');
            $table->date('start_date')->nullable();
            $table->date('d_o_b')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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