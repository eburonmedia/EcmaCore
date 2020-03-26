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
            $table->string('last_name')->after('name');
            $table->integer('admin_role')->default(0)->after('remember_token');
            $table->boolean('developer')->default(0)->after('admin_role');
            $table->boolean('active')->default(1)->after('developer');

            $table->renameColumn('name', 'first_name');
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
            $table->dropColumn(['admin_role', 'developer', 'active']);
        });
    }
}
