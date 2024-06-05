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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->integer('user_id');
            $table->integer('place_id');
            $table->integer('branches_amount');
            $table->integer('branches_condition');
            $table->integer('trashes_amount');
            $table->integer('trashes_condition');
            $table->integer('light');
            $table->integer('common_condition');
            $table->integer('toilet');
            $table->integer('toilet_condition');
            $table->boolean('ramp');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('feedback');
    }
};
