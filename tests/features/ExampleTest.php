<?php


class ExampleTest extends FeaturesTestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    function test_basic_example()
    {
        $name = 'Alejandro Zorita';
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
