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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('summary');
            $table->json('authors'); // Para guardar una lista de nombres
            $table->string('advisor');
            $table->string('file_path'); // Ruta del archivo PDF 
            $table->string('url')->nullable(); // URL donde puedes agregar un enlace
            $table->string('type')->nullable(); // Tipo de proyecto
            $table->string('center')->nullable(); // Centro de formación
            $table->string('program')->nullable(); // Programa que está estudiando
            $table->timestamps();
        });

        
    }

    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
