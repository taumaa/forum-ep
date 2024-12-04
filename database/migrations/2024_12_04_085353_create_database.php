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
        Schema::dropIfExists('users');
        Schema::dropIfExists('forum_editions');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('forum_edition_companies');
        Schema::dropIfExists('school_levels');
        Schema::dropIfExists('school_paths');
        Schema::dropIfExists('company_school_paths');
        Schema::dropIfExists('internship_offers');
        Schema::dropIfExists('school_level_offers');
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('faqs');

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id')->primary();
            $table->string('name');
            $table->string('logo');
            $table->string('sector');
            $table->string('description', 2000);
            $table->string('website');
            $table->string('contact');
        });

        Schema::create('forum_editions', function (Blueprint $table) {
            $table->increments('forum_id')->primary();
            $table->date('date'); 
            $table->string('picture');
            $table->string('starting_hour');
            $table->string('ending_hour');
        });

        Schema::create('forum_edition_companies', function (Blueprint $table) {
            $table->increments('forum_edition_company_id')->primary();
            $table->unsignedInteger('forum_id');
            $table->unsignedInteger('company_id');

            $table->foreign('forum_id')->references('forum_id')->on('forum_edition')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
        });

        Schema::create('school_levels', function (Blueprint $table) {
            $table->increments('school_level_id')->primary();
            $table->string('school_level_label');
        });

        Schema::create('school_paths', function (Blueprint $table) {
            $table->increments('school_path_id')->primary();
            $table->string('school_path_label');
        });

        Schema::create('company_school_paths', function (Blueprint $table) {
            $table->increments('company_school_path_id')->primary();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('school_path_id');
            
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
        });

        Schema::create('internship_offers', function (Blueprint $table) {
            $table->increments('internship_offer_id')->primary();
            $table->string('title');
            $table->string('offer_description', 5000);
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('school_path_id');

            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
        });

        Schema::create('school_level_offers', function (Blueprint $table) {
            $table->increments('school_level_offer')->primary();
            $table->unsignedInteger('internship_offer_id');
            $table->unsignedInteger('school_level_id');

            $table->foreign('internship_offer_id')->references('internship_offer_id')->on('internship_offer')->onDelete('cascade');
            $table->foreign('school_level_id')->references('school_level_id')->on('school_level')->onDelete('cascade');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id')->primary();
            $table->string('last_name');
            $table->string('first_name');
            $table->boolean('admin');
            $table->unsignedInteger('school_level_id');
            $table->unsignedInteger('school_path_id');
            $table->boolean('abroad');
            $table->string('cv');
            
            $table->foreign('school_level_id')->references('school_level_id')->on('school_level')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->primary();
            $table->string('login');
            $table->string('password', 2000);
            $table->string('type');
            $table->int('student_id');
            $table->int('company_id');

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('setting_id')->primary();
            $table->string('logo');
            $table->string('ico');
            $table->string('description', 3000);
            $table->string('image');
            $table->string('video');
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('faq_id')->primary();
            $table->string('question');
            $table->string('answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
