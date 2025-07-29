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
        Schema::create('ordenpagos', function (Blueprint $table) {
            $table->id();

            $table->decimal('total', 10, 2)->default(0.00);
            $table->decimal('cuenta', 10, 2)->default(0.00)->nullable();
            $table->decimal('saldo', 10, 2)->default(0.00)->nullable();
            $table->enum('estado', ['Por pagar', 'cancelado'])->default('Por pagar');

            $table->foreignId('trabajo_id')
                ->constrained('trabajos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('ordenpagos', function (Blueprint $table) {
            $table->dropForeign(['trabajo_id']);
        });
        Schema::dropIfExists('ordenpagos');
    }
};
