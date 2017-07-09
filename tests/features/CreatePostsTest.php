<?php

class CreatePostsTest extends FeaturesTestCase
{
    /**
     * Creamos un posts.
     */
    public function test_a_user_create_a_post()
    {
        // Having
        $titulo = 'Esta es una pregunta';

        $contenido = 'Este es el contenido';

        $this->actingAs($user = $this->defaultUser());

        // When
        $this->visit(route('posts.create'))
            ->type($titulo, 'title')
            ->type($contenido, 'content')
            ->press('Publicar');

        // Then
        $this->seeInDatabase('posts', [
            'title'   => $titulo,
            'content' => $contenido,
            'pending' => true,
            'user_id' => $user->id,
            'slug'    => 'esta-es-una-pregunta',
        ]);

        // Test a user is redirect to the posts detail after creating it
        $this->see($titulo);
        //$this->seeInElement('h1',$titulo);
    }

    public function test_a_gust_user_tries_to_create_a_post()
    {
        $this->visit(route('posts.create'))
                ->seePageIs(route('login'));
    }

    public function test_create_post_form_validate()
    {
        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title'   => 'El campo título es obligatorio',
                'content' => 'El campo contenido es obligatorio',
            ]);
    }

    /*ublic function test_creating_a_post_requireds_authentication()
    {

        // Having
        $titulo = 'Esta es una pregunta';

        $contenido = 'Este es el contenido';

        // When
        $this->visit(route('posts.create'))
            ->type($titulo, 'title')
            ->type($contenido, 'content')
            ->press('Publicar');

        // Then
        $this->seeInDatabase('posts', [
            'title'   => $titulo,
            'content' => $contenido,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        // Test a user is redirect to the posts detail after creating it
        $this->see($titulo);
        //$this->seeInElement('h1',$titulo);
    }*/
}
