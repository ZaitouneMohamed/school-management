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
        Schema::table('users', function (Blueprint $table) {
            $table->string("admission_number")->nullable();
            $table->string("role_number")->nullable();
            $table->unsignedBigInteger("class_id")->nullable();
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->string("gender")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("caste")->nullable();
            $table->string("religion")->nullable();
            $table->string("mobile")->nullable();
            $table->date("admission_date")->nullable();
            $table->string("profile_pic")->nullable();
            $table->string("blood_group")->nullable();
            $table->integer("height")->nullable();
            $table->integer("weight")->nullable();
            $table->integer("status")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn("admission_number");
            $table->dropColumn("role_number");
            $table->dropColumn("class_id");
            $table->dropColumn("gender");
            $table->dropColumn("date_of_birth");
            $table->dropColumn("caste");
            $table->dropColumn("religion");
            $table->dropColumn("mobile");
            $table->dropColumn("admission_date");
            $table->dropColumn("profile_pic");
            $table->dropColumn("blood_group");
            $table->dropColumn("height");
            $table->dropColumn("weight");
            $table->dropColumn("status");
        });
    }
};
