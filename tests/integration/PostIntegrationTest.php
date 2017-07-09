<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_slug_is_generated_and_saved_to_the_database()
    {
        $post = $this->createPost([
            'title' => 'Como instalar laravel',
        ]);

        $this->seeInDatabase('posts', [
            'slug' => $post->slug,
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);

        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
