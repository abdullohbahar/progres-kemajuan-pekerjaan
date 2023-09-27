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
        Schema::create('time_schedule_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('kind_of_work_detail_id')->nullable()->constrained('kind_of_work_details')->nullOnDelete(); // id detail pekerjaan
            $table->string('week');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('time_schedule_histories');
    }
};
