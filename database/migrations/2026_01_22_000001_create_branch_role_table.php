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
        // If a legacy branch_permission pivot exists, drop it as we're migrating
        // branch-level assignments from permissions -> roles.
        if (Schema::hasTable('branch_permission')) {
            Schema::dropIfExists('branch_permission');
        }

        Schema::create('branch_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_role');
        // We intentionally do not recreate branch_permission here. If needed,
        // a separate migration can re-create it and migrate data back.
    }
};
