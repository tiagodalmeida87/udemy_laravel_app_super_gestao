<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // instanciando o objeto
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(81) 9990-0011';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao Super Gestão';
        // $contato->save();

        SiteContato::factory()->count(50)->create();
    }
}
