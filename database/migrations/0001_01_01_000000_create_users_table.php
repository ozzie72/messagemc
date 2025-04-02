<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//use Spatie\Permission\Models\Role; // Importar el modelo Role /////////////////////////

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
/*
        // Asignar roles
        $adminRole = Role::findByName('admin'); // Obtener el rol 'admin'
        $usuarioAdmin->assignRole($adminRole); // Asignar el rol al usuario

        $adminTotaltextoRole = Role::findByName('admin-totaltexto'); // Obtener el rol 'admin-totaltexto'
        $usuarioAdminTotaltexto->assignRole($adminTotaltextoRole); // Asignar el rol al usuario

        $superAdminRole = Role::findByName('superadmin'); // Obtener el rol 'superadmin'
        $usuarioSuperadmin->assignRole($superAdminRole); // Asignar el rol al usuario   
        */     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
