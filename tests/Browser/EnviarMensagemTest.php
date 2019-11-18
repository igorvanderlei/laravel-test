<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnviarMensagemTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testExample()
    {
        $this->browse(function ($browser) {
            $f1 = \App\Funcionario::find(1);
            $f2 = \App\Funcionario::find(2);

            $mensagem = factory(\App\Mensagem::class)->make();

            $browser->loginAs($f1)
                ->visit('/home')
                ->pause(3000)
                ->visit('/escrever')
                ->pause(3000)
                ->type('destinatario', $f2->nome)
                ->type('titulo', $mensagem->titulo)
                ->type('texto', $mensagem->texto)
                ->press('Enviar')
                ->assertPathIs('/home')

                ->assertSee("Mensagem enviada com sucesso")
            ->pause(4000);
                //->pause(1000);
            ;

            $browser->loginAs($f2)

                ->visit('/home/inbox')
                ->pause(4000)
                ->assertSee($f1->nome)
                ->assertSee($mensagem->titulo)
                ->pause(4000);

        });

    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
}
