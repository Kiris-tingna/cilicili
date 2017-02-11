<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/2/6
 * Time: 11:53
 */

namespace App\Repositories;
use App\Repositories\Eloquent\Repository;
use App\User;
use Cmgmyr\Messenger\Models\Thread;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function GetAllMessage($uid)
    {
        return Thread::forUser($uid)->latest('updated_at')->get();
    }
}