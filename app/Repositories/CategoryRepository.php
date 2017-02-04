<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/1/8
 * Time: 13:06
 */

namespace App\Repositories;
use App\Repositories\Eloquent\Repository;
use App\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository extends Repository
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Category::class;
    }
    public function IndexSampleWithCate()
    {
        return $this->model->withDepth()->having('depth', '=', 1)->get();
    }
    /**
     * @return mixed
     */
    public function Show()
    {
        return $this->model->get()->toFlatTree();
    }

    /**
     * @param $id
     * @param int $step
     * @return mixed
     */
    public function MoveUp($id, $step = 1)
    {
        return $this->model->find($id)->up($step);
    }

    /**
     * @param $id
     * @param int $step
     * @return mixed
     */
    public function MoveDown($id, $step = 1)
    {
        return $this->model->find($id)->down($step);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function MakeRoot($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ToBeRoot($id)
    {
        return $this->model->find($id)->saveAsRoot();
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public  function MakeChild($id, $data)
    {
        return $this->model->find($id)->children()->create($data);
    }
    /**
     * @param $id
     * @param $sid
     * @return mixed
     */
    public function AttachSpecial($id, $sid)
    {
        return $this->model->find($id)->specials()->attach($sid);
    }

    public function Move($cid, $pid)
    {
        $node = $this->model->find($cid);
        $node->parent_id = $pid;
        return $node->save();
    }
}