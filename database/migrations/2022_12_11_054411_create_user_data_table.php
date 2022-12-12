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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('current_height');
            $table->integer('current_weight');
            $table->string('target');
            $table->string('liveliness');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->integer('target_weight')->default(0);
            $table->decimal('weekly_target', 8, 2)->default(0);
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
        Schema::dropIfExists('user_data');
    }
};
