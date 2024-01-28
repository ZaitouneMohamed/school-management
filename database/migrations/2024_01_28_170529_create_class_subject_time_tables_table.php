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
        Schema::create('class_subject_time_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("classe_id");
            $table->foreign("classe_id")->references("id")->on("classes")->onDelete('cascade');
            $table->unsignedBigInteger("subject_id");
            $table->foreign("subject_id")->references("id")->on("subjects")->onDelete('cascade');
            $table->unsignedBigInteger("week_id");
            $table->foreign("week_id")->references("id")->on("weeks")->onDelete('cascade');
            $table->time("start_time");
            $table->time("end_time");
            $table->string("room_number");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_subject_time_tables');
    }
};
