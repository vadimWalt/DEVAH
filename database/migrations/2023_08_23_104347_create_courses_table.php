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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("teacher_id")->constrained("users")->onDelete("cascade");
            $table->string("title");
            $table->string("picture")->default("images/courses/JRFN2xWs83F7HMI72e0qdrEdWZo1M6gss8RqQwpd.jpg");
            $table->string("description");
            $table->longText("content");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};