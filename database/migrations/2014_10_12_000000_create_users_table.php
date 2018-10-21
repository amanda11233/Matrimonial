<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('account_for');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->double('height')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('citizen_status')->nullable();
            $table->string('language')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('disability')->nullable();
            $table->string('family_type')->nullable();
            $table->string('family_status')->nullable();
            $table->string('family_values')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('sub_caste')->nullable();
           
            $table->string('education')->nullable();
            $table->string('college')->default('None')->nullable();
            $table->string('employed_in')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('income')->nullable();
            $table->string('diet')->nullable();
            $table->string('smoke')->nullable();
            $table->string('drinks')->nullable();
           $table->double('weight')->nullable();
            $table->string('photo')->nullable();
            $table->string('about_me')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->nullable();
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
