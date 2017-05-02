<?php


class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
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
