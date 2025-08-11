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
        Schema::create('t_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 100);
            $table->string('p_surname', 100);
            $table->string('m_surname', 100);
            $table->string('curp', 20)->unique();
            $table->string('rfc', 20)->unique();
            $table->string('nss', 20)->unique();
            $table->date('birthday')->nullable();
            $table->string('photo', 200)->nullable();

            //CONTACT
            $table->string('email_p', 100)->nullable();
            $table->string('phone_p', 10)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('locality', 100)->nullable();
            $table->string('zip', 5)->nullable();
            $table->unsignedBigInteger('town_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('contact_em', 100)->nullable();
            $table->string('phone_em', 10)->nullable();
            $table->string('relation_em', 100)->nullable();

            //ENTERPRISE DATA
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('payroll_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->date('hiring_date')->nullable();
            $table->double('m_salary')->nullable();
            $table->double('d_salary')->nullable();
            $table->string('phone_ent', 10)->nullable();
            $table->string('email_ent', 100)->nullable();

            //BANK DATA
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('account_number', 100)->nullable();
            $table->string('account_key', 100)->nullable();

            //ADITIONALS
            $table->date('term_date')->nullable();
            $table->date('term_reason')->nullable();
            $table->date('return_date')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(1);

            //RELATIONS
            $table->foreign('company_id')->references('id')->on('c_companies')->onDelete('cascade');
            $table->foreign('payroll_id')->references('id')->on('c_payrolls')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('c_departments')->onDelete('cascade');
            $table->foreign('town_id')->references('id')->on('c_towns')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('c_states')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('c_positions')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('c_branches')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('c_banks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('t_employees_docs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('document_id');
            $table->string('path', 100);
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(1);

            $table->foreign('employee_id')->references('id')->on('t_employees')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('c_documents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('t_employees_incs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('incident_id');
            $table->string('date', 100);
            $table->double('amount');
            $table->text('notes');

            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(1);

            $table->foreign('employee_id')->references('id')->on('t_employees')->onDelete('cascade');
            $table->foreign('incident_id')->references('id')->on('c_incidents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_employees_docs');
        Schema::dropIfExists('t_employees_incs');
        Schema::dropIfExists('t_employees');
    }
};
