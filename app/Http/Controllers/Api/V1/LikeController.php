<?php

namespace App\Http\Controllers\Api\V1;

use Event;
use Request;
use App\Events\LikeStatEvent;
use App\Repositories\VideoRepository;
use App\Repositories\SpecialRepository;

class LikeController extends BaseController
{
    protected $special;
    protected $video;

    public function __construct(VideoRepository $video, SpecialRepository $special)
    {
        $this->video = $video;
        $this->special = $special;
    }
    public function test()
    {
        return $this->response->array([1,2,3]);
    }

    public function alike(Request $request)
    {
        $id = $request->get('id');
        Event::fire(new LikeStatEvent($this->special, $id));
        return ['status' => 200, 'message' => 'success'];
    }

    public function vlike(Request $request)
    {
        $id = $request->get('id');
        Event::fire(new LikeStatEvent($this->video, $id));
        return ['status' => 200, 'message' => 'success'];
    }
}