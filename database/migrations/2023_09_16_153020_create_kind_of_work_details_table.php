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
        Schema::create('kind_of_work_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('kind_of_work_id')->nullable()->constrained('kind_of_works')->nullOnDelete(); // i macam pekerjaan
            $table->text('name');
            $table->text('information')->nullable(); // keterangan
            $table->text('contract_volume')->nullable(); // volume kontrak
            $table->text('contract_unit')->nullable(); // satuan kontrak
            $table->text('contract_unit_price')->nullable(); // harga satuan kontrak
            $table->text('mc_volume')->nullable(); // volume mc
            $table->text('mc_unit')->nullable(); // unit mc
            $table->text('mc_unit_price')->nullable(); // harga satuan mc
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
        Schema::dropIfExists('kind_of_work_details');
    }
};
