<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

//use Illuminate\Foundation\Testing\DatabaseMigrations;

class FeaturesTestCase extends TestCase
{
    // Cargamos todas las BD en cada ejecución dejando la BD en blanco
    // use DatabaseMigrations;
    //
    // Usaremos este comando para evitar que teniendo
    // muchas migraciones, las pruebas se hagan lentas,
    // por lo que se ejecutarán en transanciones
    use DatabaseTransactions;

    public function seeErrors(array $fields)
    {
        foreach ($fields as $name => $errors)
        {
            foreach ((array) $errors as $message)
            {
                $this->seeInElement(
                    "#field_{$name}.has-error .help-block", $message
                );
            }
        }

    }
}
