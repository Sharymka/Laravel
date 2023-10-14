<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_in_soc', 20)
                  ->default('')
                  ->comment('id в социальных сетях');
            $table->index('id_in_soc');
            $table->enum('type_auth', ['site', 'vkontakte', 'github'])
                  ->default('site')
                  ->comment('указывает на то какой тип авторизации использует пользователь');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_in_soc', 'type_auth');
        });
    }
};
