<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //clear table data before adding new fields
        DB::table('job_listings')->truncate();

        Schema::table('job_listings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->integer('salary');
            $table->string('tags')->nullable();
            $table->enum('job_type', ['full_time', 'part_time', 'contract', 'temporary', 'internship', 'Volunteer', 'On-Call'])->default('full-time');
            $table->boolean('remote')->default(false);
            $table->string('requirements')->nullable();
            $table->string('benefits')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('zip_code')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_description')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_logo')->nullable();

            //Add user foriegn key constarint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            
            // Drop foreign key constraint
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropColumn([
                'salary',
                'tags',
                'job_type',
                'remote',
                'requirements',
                'benefits',
                'address',
                'city',
                'state',
                'zip_code',
                'contact_email',
                'contact_phone',
                'company_name',
                'company_description',
                'company_website',
                'company_logo'
            ]);
        });
    }
};
