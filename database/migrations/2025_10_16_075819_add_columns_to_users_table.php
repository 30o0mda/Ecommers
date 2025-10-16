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
            $table->string('phone')->after('email')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->unsignedTinyInteger('role')->default(2)->after('password')->comment('1 = Admin,2 = supervisor, 3 = User');
            $table->unsignedTinyInteger('status')->after('role')->default(0);
            $table->unsignedTinyInteger('is_blocked')->after('status')->default(0)->comment('0 = Not Blocked, 1 = Blocked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('role');
            $table->dropColumn('status');
            $table->dropColumn('is_blocked');
        });
    }
};
