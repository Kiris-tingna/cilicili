<?php

namespace App\Http\Controllers;

use Request;
use Event;
use App\Events\LikeStatEvent;
use App\Repositories\VideoRepository;
use App\Repositories\SpecialRepository;

class ApiController extends Controller
{
    /**
     * @var Special|SpecialRepository
     */
    protected $special;
    protected $video;

    public function __construct(VideoRepository $video, SpecialRepository $special)
    {
        $this->video = $video;
        $this->special = $special;
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     * @internal param $id
     */
    public function alike()
    {
        if(Request::has('id'))
        {
            $id = Request::input('id');
        }else{
            return response()->json(array(
                'status' => 600,
                'message' => 'this request param is not right',
            ));
        }
        Event::fire(new LikeStatEvent($this->special, $id));
        return response()->json(array(
            'status' => 200,
            'message' => 'success',
        ));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     * @internal param $avid
     */
    public function vlike()
    {
        if(Request::has('id'))
        {
            $id = Request::input('id');
        }else{
            return response()->json(array(
                'status' => 600,
                'message' => 'this request param is not right',
            ));
        }

        Event::fire(new LikeStatEvent($this->video, $id));
        return response()->json(array(
            'status' => 200,
            'message' => 'success',
        ));
    }
}
