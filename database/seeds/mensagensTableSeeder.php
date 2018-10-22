<?php

use Illuminate\Database\Seeder;
use App\mensagem;

class mensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mensagem::create([
            'titulo' => 'Titulo 1',
            'texto' => 'Texto 1',
            'autor' => 'Autor 1',
            'user_id' => 1,
            'atividade_id' => 1
        ]);

        mensagem::create([
            'titulo' => 'Titulo 2',
            'texto' => 'Texto 2',
            'autor' => 'Autor 2',
            'user_id' => 1,
            'atividade_id' => 1
        ]);

    }
}
