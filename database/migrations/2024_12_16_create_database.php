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
        Schema::dropIfExists('school_path_offers');
        Schema::dropIfExists('students');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('options');
        Schema::dropIfExists('quote');

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('setting_id');
            $table->string('logo');
            $table->string('logo_footer');
            $table->string('ico');
            $table->string('description', 3000);
            $table->string('image');
            $table->string('video');
            $table->string('building');
            $table->string('contact');
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('faq_id');
            $table->string('question');
            $table->string('answer', 2000);
        });

        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('sector_id');
            $table->string('sector_label');
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('name');
            $table->unsignedInteger('siret');
            $table->string('logo');
            $table->unsignedInteger('sector_id');
            $table->string('description', 3000);
            $table->string('location');
            $table->string('website');
            $table->string('email');
            $table->string('phone');

            $table->foreign('sector_id')->references('sector_id')->on('sectors')->onDelete('cascade');
        });

        Schema::create('forum_editions', function (Blueprint $table) {
            $table->increments('forum_id');
            $table->date('date'); 
            $table->string('picture');
            $table->string('starting_hour');
            $table->string('ending_hour');
        });

        Schema::create('forum_edition_companies', function (Blueprint $table) {
            $table->increments('forum_edition_company_id');
            $table->unsignedInteger('forum_id');
            $table->unsignedInteger('company_id');

            $table->foreign('forum_id')->references('forum_id')->on('forum_editions')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

        Schema::create('school_levels', function (Blueprint $table) {
            $table->increments('school_level_id');
            $table->string('school_level_label');
        });

        Schema::create('school_paths', function (Blueprint $table) {
            $table->increments('school_path_id');
            $table->string('school_path_label');
        });

        Schema::create('internship_offers', function (Blueprint $table) {
            $table->increments('internship_offer_id');
            $table->string('title');
            $table->string('offer_description', 5000);
            $table->unsignedInteger('company_id');
            $table->string('location');
            $table->string('date');
            $table->unsignedInteger('min_duration');
            $table->unsignedInteger('max_duration');

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

        Schema::create('school_level_offers', function (Blueprint $table) {
            $table->increments('school_level_offer_id');
            $table->unsignedInteger('internship_offer_id');
            $table->unsignedInteger('school_level_id');

            $table->foreign('internship_offer_id')->references('internship_offer_id')->on('internship_offers')->onDelete('cascade');
            $table->foreign('school_level_id')->references('school_level_id')->on('school_levels')->onDelete('cascade');
        });

        Schema::create('school_path_offers', function (Blueprint $table) {
            $table->increments('school_path_offer_id');
            $table->unsignedInteger('internship_offer_id');
            $table->unsignedInteger('school_path_id');

            $table->foreign('internship_offer_id')->references('internship_offer_id')->on('internship_offers')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_paths')->onDelete('cascade');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('last_name');
            $table->string('first_name');

            $table->unsignedInteger('school_level_id')->nullable();
            $table->unsignedInteger('school_path_id')->nullable();
            $table->boolean('abroad')->default(false);
            $table->string('cv')->nullable();
            
            $table->foreign('school_level_id')->references('school_level_id')->on('school_levels')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_paths')->onDelete('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('email');
            $table->string('password', 2000);
            $table->enum('type', ['student', 'company', 'admin']);
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

        Schema::create('options', function (Blueprint $table) {
            $table->increments('option_id');
            $table->string('option_label');
        });

        Schema::create('quote', function (Blueprint $table) {
            $table->increments('quote_id');
            $table->string('quote_name');
            $table->boolean('is_validated');
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
