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
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->dropColumn(['name', 'email', 'email_verified_at', 'password']);
            $table->string('name', length: 128)->after('id');
            $table->string('email', length: 225)->after('name');
            $table->string('phone', length: 10)->after('email')->nullable();
            $table->string('password', length: 225)->after('phone')->nullable()->default('sidhfs989w3riser3e');
            $table->date('registered_at')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['name', 'email', 'phone', 'password', 'registered_at']);
             $table->string('name');
             $table->string('email')->unique();
             $table->timestamp('email_verified_at')->nullable();
             $table->string('password');
        });
    }
};
