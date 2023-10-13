<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(1)
                ->constrained()
                ->restrictOnDelete();

        });
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => '3'
            ]
        ]);
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }
};
