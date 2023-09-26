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
        Schema::create('mc_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('kind_of_work_detail_id')->nullable()->constrained('kind_of_work_details')->nullOnDelete(); // id detail pekerjaan
            $table->string('from_mc_volume');
            $table->string('to_mc_volume');
            $table->string('from_mc_unit');
            $table->string('to_mc_unit');
            $table->string('from_mc_unit_price');
            $table->string('to_mc_unit_price');
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
        Schema::dropIfExists('mc_histories');
    }
};
