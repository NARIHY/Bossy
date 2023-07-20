<?php

use App\Models\Etudiant;
use App\Models\Promotion;
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
        Schema::create('etudiant_promotion', function (Blueprint $table) {
            $table->foreignIdFor(Promotion::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Etudiant::class)->constrained()->cascadeOnDelete();
            $table->primary(['etudiant_id', 'promotion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_promotion');
    }
};
