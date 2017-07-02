<?php


class ShowPostTest extends FeaturesTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_see_the_post_details()
    {
        // Having

        $user = $this->defaultUser();

        $post = factory(App\Post::class)->make([
            'title' => 'Este es el título del post',
            'content' => 'Este es el contenido del post',
            'user_id'     => $user->id,
        ]);

        // When

        $this->visit($post->url)
        ->seeInElement('h1', $post->title)
        ->see($post->content)
        ->see($user->name);
    }


    function test_old_are_redirected()
    {
        // Having

        $user = $this->defaultUser();

        $post = factory(App\Post::class)->make([
            'title' => 'Old title',
        ]);

        $user->posts()->save($post);

        $url = $post->url;

        $post->update(['title' => 'New title']);

        $this->visit($url)
            ->seePageIs($post->url);
    }


}
