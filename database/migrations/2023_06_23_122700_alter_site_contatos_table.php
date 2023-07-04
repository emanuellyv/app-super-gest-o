<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->string('nome')->nullable()->change();
            $table->string('telefone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->integer('motivo')->nullable()->change();
            $table->text('mensagem')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->string('nome')->nullable(false)->change();
            $table->string('telefone')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->integer('motivo')->nullable(false)->change();
            $table->text('mensagem')->nullable(false)->change();
        });
    }
}
