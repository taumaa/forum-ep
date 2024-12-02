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
        Schema::dropIfExists('forum_edition');
        Schema::dropIfExists('company');
        Schema::dropIfExists('forum_edition_company');
        Schema::dropIfExists('school_level');
        Schema::dropIfExists('school_path');
        Schema::dropIfExists('school_path_company');
        Schema::dropIfExists('internship_offer');
        Schema::dropIfExists('school_level_offer');
        Schema::dropIfExists('visitor');

        Schema::create('company', function (Blueprint $table) {
            $table->increments('company_id')->primary();
            $table->string('name');
            $table->string('logo');
            $table->string('sector');
            $table->string('description', 2000);
            $table->string('website');
            $table->string('contact');
        });

        Schema::create('forum_edition', function (Blueprint $table) {
            $table->increments('forum_id')->primary();
            $table->date('date'); 
            $table->string('picture');
        });

        Schema::create('forum_edition_company', function (Blueprint $table) {
            $table->increments('forum_edition_company_id')->primary();
            $table->unsignedInteger('forum_id');
            $table->unsignedInteger('company_id');

            $table->foreign('forum_id')->references('forum_id')->on('forum_edition')->onDelete('cascade');
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
        });

        Schema::create('school_level', function (Blueprint $table) {
            $table->increments('school_level_id')->primary();
            $table->string('school_level_label');
        });

        Schema::create('school_path', function (Blueprint $table) {
            $table->increments('school_path_id')->primary();
            $table->string('school_path_label');
        });

        Schema::create('school_path_company', function (Blueprint $table) {
            $table->increments('school_path_company_id')->primary();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('school_path_id');
            
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
        });

        Schema::create('internship_offer', function (Blueprint $table) {
            $table->increments('internship_offer_id')->primary();
            $table->string('title');
            $table->string('offer_description', 2000);
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('school_path_id');

            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
        });

        Schema::create('school_level_offer', function (Blueprint $table) {
            $table->increments('school_level_offer')->primary();
            $table->unsignedInteger('internship_offer_id');
            $table->unsignedInteger('school_level_id');

            $table->foreign('internship_offer_id')->references('internship_offer_id')->on('internship_offer')->onDelete('cascade');
            $table->foreign('school_level_id')->references('school_level_id')->on('school_level')->onDelete('cascade');
        });

        Schema::create('visitor', function (Blueprint $table) {
            $table->increments('visitor_id')->primary();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('login');
            $table->string('password', 2000);
            $table->boolean('admin');
            $table->unsignedInteger('school_level_id');
            $table->unsignedInteger('school_path_id');
            $table->boolean('abroad');
            $table->string('cv');
            
            $table->foreign('school_level_id')->references('school_level_id')->on('school_level')->onDelete('cascade');
            $table->foreign('school_path_id')->references('school_path_id')->on('school_path')->onDelete('cascade');
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
