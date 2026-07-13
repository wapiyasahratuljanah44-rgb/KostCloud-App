<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            if (!Schema::hasColumn('properties', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('properties', 'address')) {
                $table->text('address');
            }
            if (!Schema::hasColumn('properties', 'harga')) {
                $table->decimal('harga', 12, 2);
            }
            if (!Schema::hasColumn('properties', 'user_id')) {
                $table->bigInteger('user_id');
            }
        });
    }
}