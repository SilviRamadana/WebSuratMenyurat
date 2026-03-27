<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->json('cc_divisions')->nullable()->after('recipient_division');
        });
    }

    public function down(): void
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropColumn('cc_divisions');
        });
    }
};
