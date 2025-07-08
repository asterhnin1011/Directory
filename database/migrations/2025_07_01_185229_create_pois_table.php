<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('pois', function (Blueprint $table) {
            $table->id(); // optional if 'user_id' is not the primary key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('fid')->nullable();
            $table->string('shape')->nullable();
            $table->string('dps_id')->nullable();
            $table->string('source_id')->nullable();
            $table->string('source')->nullable();
            $table->string('uid')->nullable();
            $table->string('poi_n_eng')->nullable();
            $table->string('poi_n_win')->nullable();
            $table->string('poi_n_zaw')->nullable();
            $table->string('poi_n_myn3')->nullable();
            $table->string('type')->nullable();
            $table->string('dps_tsp')->nullable();
            $table->string('type_code')->nullable();
            $table->string('sub_type_c')->nullable();
            $table->string('postal_cod')->nullable();
            $table->string('st_n_eng')->nullable();
            $table->string('st_n_myn')->nullable();
            $table->string('ward_n_eng')->nullable();
            $table->string('ward_n_myn')->nullable();
            $table->string('tsp_n_eng')->nullable();
            $table->string('tsp_n_myn')->nullable();
            $table->string('dist_n_eng')->nullable();
            $table->string('dist_n_myn')->nullable();
            $table->string('s_r_n_eng')->nullable();
            $table->string('s_r_n_myn')->nullable();
            $table->string('hn_eng')->nullable();
            $table->string('hn_myn')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->text('remark')->nullable();
            $table->date('verify_dat')->nullable();
            $table->string('poi_pictur')->nullable(); // file path or URL
            $table->string('project')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poi');
    }
};