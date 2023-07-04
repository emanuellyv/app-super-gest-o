<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $contato = new SiteContato();
//        $contato->nome = 'Sistema SG';
//        $contato->telefone = '(00) 00000-0000';
//        $contato->email = 'contato@sg.com.br';
//        $contato->motivo = 1;
//        $contato->mensagem = 'Seja bem-vindo à aplicação!';
//        $contato->save();

        SiteContato::factory()->count(100)->create();
    }
}
