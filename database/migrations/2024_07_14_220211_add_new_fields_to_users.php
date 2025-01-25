<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('remember_token', function (Blueprint $table) {
                $table->string('bio')->nullable();
                $table->string('status')->nullable();
                $table->string('mood')->nullable();
                $table->unsignedBigInteger('views')->default(0);
                $table->timestamp('last_active_at');
                $table->timestamp('last_logged_in_at');
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'last_logged_in_at',
                'last_active_at',
                'views',
                'mood',
                'status',
                'bio',
            ]);
        });
    }
};
