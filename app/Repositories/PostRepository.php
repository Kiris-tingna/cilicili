<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/1/30
 * Time: 19:29
 */

namespace App\Repositories;
use App\Repositories\Eloquent\Repository;
use App\Post;
use Carbon\Carbon;
use Redis;

class PostRepository extends Repository
{
    const ONE_WEEK_IN_SECONDS = 7 * 86400;
    const ONE_VOTE_SCORE = 432;

    public function model()
    {
        return Post::class;
    }

    public function IndexSampleWithVotes()
    {
        // 按评分来排序文章
        return $this->model->orderBy('votes')->get();
    }

    public function vote($userId, $postId)
    {
        $singleArticle = $this->model->find($postId);

        // hset
        Redis::hSet('posts:'.$postId, 'votes', $singleArticle->votes);

        // 计算文章投票截止时间
        $end = Carbon::now()->subWeek();

        if(Carbon::parse($singleArticle->created_at)->lt($end))
        {
            return False;
        } else if(Redis::sAdd('voted:post:'.$postId, $userId)){
            Redis::zIncrBy('score:post', self::ONE_VOTE_SCORE, $postId);
            Redis::hIncrBy('posts:'.$postId, 'votes', 1);
            $singleArticle->increment('votes', 1);
            return True;
        }

        return False;
    }
}