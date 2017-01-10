<?php
namespace App\Repositories;
use App\Repositories\Eloquent\Repository;
use App\Special;

class SpecialRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Special::class;
    }

    /**
     * @param $id
     * @return array
     */
    public function singleSpecialAndlistVideos($id)
    {
        // 获得这个合计
        $special = $this->model->find($id);
        // 获得这个合集的所有分集
        $others = $special->videos;
        return array(
            'special' => $special,
            'PartList'=> $others
        );
    }

    /**
     * @param $id
     */
    public function ViewedThisOne($id)
    {
        // 合集播放数目加1
        $this->model->find($id)->increment('played', 1);
    }

    /**
     * @param $id
     */
    public function LikedThisOne($id)
    {
        // 合集喜欢数目加1
        $this->model->find($id)->increment('liked', 1);
    }

    /**
     * @param $id
     * @param $cid
     * @return mixed
     */
    public function SyncSpecial($id, $cid)
    {
        return $this->model->find($id)->categories()->sync($cid);
    }
}