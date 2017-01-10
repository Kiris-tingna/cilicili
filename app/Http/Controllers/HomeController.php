<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\LikeStatEvent;
use App\Events\ViewCountsEvent;
use Request;
use Event;
use Cache;
use App\Repositories\VideoRepository;
use App\Repositories\SpecialRepository;

class HomeController extends Controller
{
    /**
     * @var Video|VideoRepository
     */
    protected $video;
    /**
     * @var Special|SpecialRepository
     */
    protected $special;

    /**
     * HomeController constructor.
     * @param Video|VideoRepository $video
     * @param Special|SpecialRepository $special
     */
    public function __construct(VideoRepository $video, SpecialRepository $special)
    {
        $this->middleware('auth');

        $this->video = $video;
        $this->special = $special;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::whereIsRoot()->get();

        return view('home', compact('category'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function specials($id)
    {
        // 触发浏览量统计事件
        Event::fire(new ViewCountsEvent($this->special, $id));// the same as : event(new ViewCountsEvent());

        // 缓存技术 key 设计 entity:propertity:value
        $list = Cache::store('redis')->remember('special:id:'.$id, 1, function () use ($id) {
            return $this->special->singleSpecialAndlistVideos($id);
        });

        $special = $list['special'];
        $lists = $list['PartList'];

        return view('animate', compact('special', 'lists'));
    }

    /**
     * @param $avid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function videos($avid)
    {
        // 触发浏览量统计事件
        Event::fire(new ViewCountsEvent($this->video, $avid));

        $list = Cache::store('redis')->remember('video:avid:'.$avid, 1, function () use ($avid) {
            return $this->video->singleVideoAndlistOthers($avid);
        });

        $animate= $list['animate'];
        $lists = $list['PartList'];

        return view('video', compact('animate', 'lists'));
    }

    /**
     * todo  elasticsearch
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(){
        $results = $this->video->allPaginated(3);
        return view('search', compact('results'));
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
