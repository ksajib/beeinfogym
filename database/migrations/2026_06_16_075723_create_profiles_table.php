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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // User relation
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();

            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();

            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();

            $table->string('nationality')->nullable();

            // Identity
            $table->string('nid')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('passport_issue_date')->nullable();

            // Contact
            $table->string('primary_mobile')->nullable();
            $table->string('secondary_mobile')->nullable();

            $table->string('email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('profile_photo')->nullable();
            $table->text('bio')->nullable();
            $table->json('address')->nullable();
            $table->string('image_url')->nullable();
            $table->text('bio')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
