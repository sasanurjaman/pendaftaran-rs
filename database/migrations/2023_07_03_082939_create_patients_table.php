<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('patient_name', 128);
            $table->enum('patient_gender', ['Laki-laki', 'Perempuan']);
            $table->date('patient_brithday');
            $table->string('patient_born', 128);
            $table->integer('patient_age');
            $table->text('patient_address');
            $table->enum('patient_status', ['Menikah', 'Belum Menikah']);
            $table->string('patient_image');
            $table->integer('patient_is_bpjs');
            $table->string('patient_file')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
