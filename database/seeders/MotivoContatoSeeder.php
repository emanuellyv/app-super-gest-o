<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivo' => 'Dúvida']);
        MotivoContato::create(['motivo' => 'Elogio']);
        MotivoContato::create(['motivo' => 'Reclamação']);
    }
}
