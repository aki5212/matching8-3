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
        Schema::create('employer_seeker', function (Blueprint $table) {
            $table->foreignId('seeker_id')->constrained();
            $table->foreignId('employer_id')->constrained();
            $table->tinyInteger('status')->unsigned()->default(0); // 0: 保留中, 1: 採用, 2: 不採用
            $table->string('body');
            $table->timestamps();

            $table->primary(['seeker_id', 'employer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_seeker');
    }
};
