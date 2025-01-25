<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('info_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('destination');
            $table->mediumText('description');
            $table->dateTime('active_from')->index();
            $table->dateTime('active_to')->index()->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('info_boxes');
    }
};
