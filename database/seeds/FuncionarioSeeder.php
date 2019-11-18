<?php

use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Funcionario::class)->create(['nome' => 'igor', 'departamento_id' => 1]);
        factory(\App\Funcionario::class, 50)->create();

    }
}
