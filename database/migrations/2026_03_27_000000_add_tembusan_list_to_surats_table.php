<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->json('tembusan_list')->nullable()->after('cc_divisions');
        });
    }

    public function down(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropColumn('tembusan_list');
        });
    }
};
