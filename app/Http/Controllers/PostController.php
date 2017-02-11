<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function getIndex()
    {
        return view('admin.post');
    }

    public function postCreate(Request $request)
    {
        $title = $request->get('title');
        $topic = $request->get('topic');

        $this->post->create(array('title'=>$title, 'topic'=>$topic, 'votes'=>0));
        return redirect('post/index');
    }
}
