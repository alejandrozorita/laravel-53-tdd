<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    // Cargamos todas las BD en cada ejecución dejando la BD en blanco
    // use DatabaseMigrations;
    //
    // Usaremos este comando para evitar que teniendo
    // muchas migraciones, las pruebas se hagan lentas,
    // por lo que se ejecutarán en transanciones
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $name  = 'Alejandro Zorita';
        $email = 'info@alejandrozorita.me';

        $user = factory(\App\User::class)->create([
            'name'  => $name,
            'email' => $email,
        ]);

        $this->actingAs($user, 'api');

        $this->visit('api/user')
             ->see($name.$email);
    }
}
