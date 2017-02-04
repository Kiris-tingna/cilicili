<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/2/3
 * Time: 15:48
 */

namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use App\Repositories\PostRepository;
use Cache;

class PostAsideComposer
{
    protected $post;
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function compose(View $view)
    {
        return $view->with('posts', Cache::store('redis')->remember('postaside', 2, function () {
            return $this->post->IndexSampleWithVotes();
        }));
    }
}