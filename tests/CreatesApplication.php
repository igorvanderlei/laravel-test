<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp(): void {
      parent::setUp();
      \Artisan::call('migrate:fresh');
      \Artisan::call('db:seed');
   }

   public function tearDown(): void {
      \Artisan::call('migrate:rollback');
      parent::tearDown();
   }

}
