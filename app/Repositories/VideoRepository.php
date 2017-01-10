<?php
namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\Video;

class VideoRepository extends Repository
{
    /**
     * 模型放置
     * @return mixed
     */
    public function model()
    {
        return Video::class;
    }

    public function singleVideoAndlistOthers($av)
    {
        // 获得这个分集的信息
        $animate = $this->model->where('av', $av)->get()->first();
        // 获得者一合计的special_id其他聚集
        $others = $this->model->select('av', 'name', 'episode')->where('special_id', $animate->special_id)->orderBy('episode','asc')->get();
        return array(
            'animate' => $animate,
            'PartList'=> $others
        );
    }

    public function ViewedThisOne($avid)
    {
        // 分集播放数目加1
        $this->model->where('av', '=', $avid)->get()->first()->increment('played', 1);
    }

    public function LikedThisOne($id)
    {
        // 分集喜欢数目加1
        $this->model->find($id)->increment('liked', 1);
    }
}