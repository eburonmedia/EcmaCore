<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableForEcma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id', 'name']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->uuid('id')->first();

            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->integer('admin_role')->default(0)->after('remember_token');
            $table->boolean('developer')->default(0)->after('admin_role');
            $table->boolean('active')->default(1)->after('developer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id', 'first_name', 'last_name', 'admin_role', 'developer', 'active']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigIncrements('id')->first();
            $table->string('name')->after('id');
        });
    }
}
