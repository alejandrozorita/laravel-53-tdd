<?php

use App\{Comment, User};

use App\Policies\CommentPolicy;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentPolicyTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_post_author_can_select_a_comment_as_an_answer()
    {

        $comment = factory(Comment::class)->create();

        $policy = new CommentPolicy;

        $this->assertTrue(
            $policy->accept($comment->post->user, $comment)
        );

    }

    public function test_non_authors_cannot_select_a_comment_as_an_answer()
    {

        $comment = factory(Comment::class)->create();

        $policy = new CommentPolicy;

        $this->assertFalse(
            $policy->accept(factory(User::class)->create(), $comment)
        );

    }
}
