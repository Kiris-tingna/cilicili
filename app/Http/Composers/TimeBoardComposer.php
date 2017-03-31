<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/1/16
 * Time: 15:36
 */

namespace App\Http\Composers;

use App\Repositories\SpecialRepository;
use Illuminate\Contracts\View\View;
use Cache;

class TimeBoardComposer
{
    protected $special;
    public function __construct(SpecialRepository $special)
    {
        $this->special = $special;
    }

    public function compose(View $view)
    {
        return $view->with('board', Cache::store('redis')->remember('timeboard', 40, function () {
            return $this->special->ListAllByDay();
        }));
    }
}