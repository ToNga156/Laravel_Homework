<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('template', 255)->collation('utf8_unicode_ci');
            $table->string('name', 255)->collation('utf8_unicode_ci');
            $table->string('title', 255)->collation('utf8_unicode_ci');
            $table->string('slug', 255)->collation('utf8_unicode_ci');
            $table->text('content')->collation('utf8_unicode_ci')->nullable();
            $table->text('extras')->collation('utf8_unicode_ci')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};