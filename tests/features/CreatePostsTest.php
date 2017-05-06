<?php

class CreatePostsTest extends FeaturesTestCase
{

    /**
     * Creamos un posts
     */
    public function test_a_user_create_a_post()
    {
        // Having
        $titulo = 'Esta es una pregunta';

        $contenido = 'Este es el contenido';

        $this->actingAs($this->defaultUser());

        // When
        $this->visit(route('posts.create'))
            ->type($titulo,'title')
            ->type($contenido, 'content')
            ->press('Publicar');

        // Then
        $this->seeInDatabase('posts', [
             'title' => $titulo,
             'content' => $contenido,
             'pending' => true
        ]);

        // Test a user is redirect to the posts detail after creating it
        $this->see($titulo);
        //$this->seeInElement('h1',$titulo);
    }
}