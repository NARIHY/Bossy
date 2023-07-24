<?php

use App\Models\Classe;
use App\Models\Ecolage;
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
        Schema::create('classe_ecolage', function (Blueprint $table) {
            $table->foreignIdFor(Classe::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Ecolage::class)->constrained()->cascadeOnDelete();
            $table->primary(['classe_id', 'ecolage_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_ecolage');
    }
};
