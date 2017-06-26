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
            ->visit(route('post.creat'))
            ->press('Publicar')
            ->seePageIs(route('post.create'))
            ->seeInElement('#field_title .help-block', 'El campo título es obligatorio')
            ->seeInElement('#field_title .help-block', 'El campo contenido es obligatorio');
    }




    public function test_creating_a_post_requireds_authentication()
    {


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
    }
}
