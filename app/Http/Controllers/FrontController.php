<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Event;
use Cache;
use App\Repositories\VideoRepository;
use App\Repositories\SpecialRepository;
use App\Repositories\PostRepository;
use App\Events\ViewCountsEvent;

class FrontController extends Controller
{
    /**
     * @var Video|VideoRepository
     */
    protected $video;
    /**
     * @var Special|SpecialRepository
     */
    protected $special;
    protected $cate;
    protected $post;

    public function __construct(
        CategoryRepository $cate,
        VideoRepository $video,
        SpecialRepository $special,
        PostRepository $post)
    {
        $this->cate = $cate;
        $this->video = $video;
        $this->special = $special;
        $this->post = $post;
    }

    public function index()
    {
        // 缓存
        $category = Cache::store('redis')->remember('index', 10, function () {
            return $this->cate->IndexSampleWithCate();
        });

        return view('home.index', compact('category'));
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
        $list = Cache::store('redis')->remember('special:id:'.$id, 5, function () use ($id) {
            return $this->special->singleSpecialAndlistVideos($id);
        });

        $special = $list['special'];
        $lists = $list['PartList'];

        return view('home.animate', compact('special', 'lists'));
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

        $list = Cache::store('redis')->remember('video:avid:'.$avid, 5, function () use ($avid) {
            return $this->video->singleVideoAndlistOthers($avid);
        });

        $animate= $list['animate'];
        $lists = $list['PartList'];

        return view('home.video', compact('animate', 'lists'));
    }

    /**
     * todo  elasticsearch
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(){
        $results = $this->video->allPaginated(3);
        return view('home.search', compact('results'));
    }

    public function assortment($cid)
    {
        $specials = $this->cate->findBy('id', $cid)->first()->specials;
        return view('home.assortment', compact('specials'));
    }
}
