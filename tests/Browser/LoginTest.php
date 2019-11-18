<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function testExample()
    {
        $funcionario = factory(\App\Funcionario::class)->create([
            'nome' => 'ze da ema',
        ]);

        $this->browse(function ($browser) use ($funcionario) {


            $browser->visit('/login')
                ->type('nome', $funcionario->nome)
                ->type('password', 'password')
                ->pause(2000)
                ->screenshot('login')
                ->press('Login')
                ->assertPathIs('/home')
                ->pause(2000)
                ->screenshot('home')
                ;
        });
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
}
