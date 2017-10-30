<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('software_id');
            $table->integer('vendor_id');
            $table->tinyInteger('software_score')->default(0);
            $table->string('title');
            $table->string('description')->nullable();
            $table->tinyInteger('easy_use_score')->default(0);
            $table->tinyInteger('implementation_score')->default(0);
            $table->tinyInteger('technical_score')->default(0);
            $table->tinyInteger('update_score')->default(0);
            $table->tinyInteger('status')->default(0)->comment='0=pending,1=approved,2=reject';
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
        Schema::dropIfExists('votes');
    }
}
