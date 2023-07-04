<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor B';
        $fornecedor->site = 'fornecedorB.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'contato@fornecedorB.com';
        $fornecedor->save();

        // método create (atributo fillable)
        Fornecedor::create([
            'nome' => 'Fornecedor C',
            'site' => 'fornecedorC.com.br',
            'uf' => 'SC',
            'email' => 'contato@fornecedorC.com',
        ]);

        // através do insert
        DB::table('fornecedors')->insert([
           'nome' => 'Fornecedor D',
           'site' => 'fornecedorD.com.br',
           'uf' => 'RJ',
           'email' => 'contato@fornecedorD.com',
        ]);


    }
}
