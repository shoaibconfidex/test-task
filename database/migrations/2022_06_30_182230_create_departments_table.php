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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('leader')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('leader')
                ->references('id')->on('employees')->onDelete('set null');
            $table->foreign('division_id')
                ->references('id')->on('divisions')->onDelete('set null');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
