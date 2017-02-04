<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\PostRepository;

class PostTest extends TestCase
{
    public function testVote()
    {
        $user_id = 1;
        $post_id = 2;
        $post = new PostRepository($this->app);
        $now_votes = $post->vote($user_id, $post_id);
        $this->assertTrue($now_votes);
    }
}
