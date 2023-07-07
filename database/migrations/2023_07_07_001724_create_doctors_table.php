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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('doctor_name', 128);
            $table->enum('doctor_gender', ['Laki-laki', 'Perempuan']);
            $table->date('doctor_brithday');
            $table->text('doctor_address');
            $table->string('doctor_specialization');
            $table->string('doctor_image');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
