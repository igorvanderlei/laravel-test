<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Departamento::class)->create(["nome" => "RH"]);
        factory(\App\Departamento::class, 4)->create();
    }
}
