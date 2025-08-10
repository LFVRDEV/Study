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
        Schema::create('c_companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->string('rfc', 20)->unique();
            $table->string('employer_id', 20)->unique();
            $table->string('address', 200);
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_payrolls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->integer('days');
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_departments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_positions', function(Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_branches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_banks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_states', function(Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_towns', function(Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->unsignedBigInteger('state_id');
            $table->tinyInteger('status')->default(1);

            $table->foreign('id')->references('id')->on('c_states')->onDelete('cascade');
        });
        Schema::create('c_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->tinyInteger('status')->default(1);
        });
        Schema::create('c_incidents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100)->unique();
            $table->string('type', 1);
            $table->string('unit', 1);
            $table->double('amount')->default(0);
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_companies');
        Schema::dropIfExists('c_payrolls');
        Schema::dropIfExists('c_departments');
        Schema::dropIfExists('c_positions');
        Schema::dropIfExists('c_branches');
        Schema::dropIfExists('c_banks');
        Schema::dropIfExists('c_towns');
        Schema::dropIfExists('c_states');
        
        Schema::dropIfExists('c_documents');
        Schema::dropIfExists('c_incidents');
    }
};
