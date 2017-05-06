<?php

class CreatePostsTest extends FeaturesTestCase
{

    /**
     * Creamos un post
     */
    public function test_a_user_create_a_post()
    {
        // Having
        $titulo = 'Esta es una pregunta';

        $contenido = 'Este es el contenido';

        $this->actingAs($this->defaultUser());

        // When
        $this->visit(route('post.create'))
            ->type($titulo,'title')
            ->type($contenido, 'content')
            ->press('Publicar');

        // Then
        $this->seeInDatabase('post', [
             'title' => $titulo,
             'content' => $contenido,
             'pending' => true
        ]);

        // Test a user is redirect to the post detail after creating it
        $this->seeInElement('h1',$titulo);
    }
}