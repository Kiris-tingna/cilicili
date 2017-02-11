<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/2/3
 * Time: 15:48
 */

namespace App\Http\Composers;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Cache;
use Auth;

class MessageComposer
{
    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function compose(View $view)
    {
        return $view->with('message', Cache::store('redis')->remember('message:new', 10, function () {
            return $this->user->GetAllMessage(Auth::user()->id);
        }));
    }
}