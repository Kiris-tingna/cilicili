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

    public function ListAllByDay()
    {
        $result = [];
        for($weekday = 1; $weekday <= 7; $weekday++)
        {
            switch ($weekday) {
                case 1:
                    $transform = 'monday';
                    break;
                case 2:
                    $transform = 'tuesday';
                    break;
                case 3:
                    $transform = 'wednesday';
                    break;
                case 4:
                    $transform = 'thursday';
                    break;
                case 5:
                    $transform = 'friday';
                    break;
                case 6:
                    $transform = 'saturday';
                    break;
                case 7:
                    $transform = 'sunday';
                    break;
                default:
                    $transform = 'error occured';
                    break;
            }
            $result[$transform] = $this->model->where('weekday', $weekday)->orderBy('created_at','desc')->limit(10)->get();
        }

        return $result;
    }
}