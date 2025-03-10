<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('utilisateurs', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        DB::statement('CREATE TABLE utilisateurs() INHERITS(users)');
        DB::statement('UPDATE TABLE utilisateurs CONSTRAINT utilisateurs_id_unique PRIMARY KEY (id)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
