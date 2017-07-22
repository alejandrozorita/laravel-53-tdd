<?php


use App\Comment;

class AcceptAnswertTest extends FeaturesTestCase
{
function test_the_posts_author_can_accept_a_comment_as_post_answer()
    {
        $comment = factory(Comment::class)->create();

        $this->actingAs($comment->post->user);

        $this->visit($comment->post->url)
            ->press('Aceptar respuesta');

        $this->seePageIs($comment->post->url)
                ->seeInElement('.answer', $comment->comment);

        $this->seeInDatabase('posts', [
            'id' => $comment->post_id,
            'pending' => false,
            'answer_id ' => $comment->id
        ]);


        $policy = new AcceptCommentPolicy;


        $this->assertTrue(
            $policy->accept($comment->post->user, $comment)
        );
    }
}
