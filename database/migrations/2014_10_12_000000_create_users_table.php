<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar')->default('default.jpg');
            $table->string('address_user')->nullable();
            $table->string('country_user')->nullable();
            $table->string('department_user')->nullable();
            $table->string('city_user')->nullable();
            $table->string('birth_date_user')->nullable();
            $table->string('sex')->nullable();
            $table->string('lenguages')->nullable();
            $table->string('religion')->nullable();
            $table->string('family_name')->nullable();
            $table->string('family_relationship')->nullable();
            $table->string('emotional_situation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('job_company')->nullable();
            $table->string('city_company')->nullable();
            $table->string('date_of_admission_company')->nullable();
            $table->string('time_frame_company')->nullable();
            $table->string('university_name')->nullable();
            $table->string('time_frame_university')->nullable();
            $table->string('completed_studies_university')->nullable();
            $table->string('title_university')->nullable();
            $table->string('school_name')->nullable();
            $table->string('time_frame_school')->nullable();
            $table->string('completed_studies_school')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
