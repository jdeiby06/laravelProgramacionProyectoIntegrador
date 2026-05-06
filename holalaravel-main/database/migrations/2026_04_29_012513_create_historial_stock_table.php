<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('usuario_id')->constrained('users');
            $table->integer('cantidad_anterior');
            $table->integer('cantidad_nueva');
            $table->string('motivo')->default('actualización manual');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_stock');
    }
};