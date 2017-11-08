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
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->string('mobile_no',20)->nullable();
            $table->string('company_name',200);
            $table->enum('gender', ['Maschio','Femmina'])->nullable();
            $table->string('photo')->nullable();
            $table->text('about');
            $table->tinyInteger('user_type')->default(1)->comment="1=user, 2=admin";
            $table->tinyInteger('user_status')->default(1)->comment="1=active, 0=inactive";
            $table->tinyInteger('email_verify')->default(0)->comment="1=verified, 0=unverified";
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
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
