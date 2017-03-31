<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/3/30
 * Time: 22:54
 */

namespace App\Services;
use App\Special;
use Redis;

class RankService
{
    const key ='rank';

    const DAY_PREFIX = 'DAY';
    const KEY_SPE = ':';

    public static function getKey()
    {
        return self::key.self::KEY_SPE.self::DAY_PREFIX;
    }

    public static function add($score, $who_id)
    {
        $key = self::getKey();
        Redis::zIncrBy($key, $score, $who_id);
    }

    /**
     * 展示排行榜前n个
     */
    public static function board($n)
    {
        $key = self::getKey();
        $lists = Redis::zRevrange($key,0, $n - 1, array('withscores'=>true));
        $rank = [];
        foreach ($lists as $key => $value){
            $rank[] = Special::find($key)->name;
        }
        return $rank;
    }

    protected static function calcScore($year, $month, $liked, $played)
    {
        return $liked * 10 + $played * 10;
    }

    public static function sync()
    {
        $key = self::getKey();
        $specials = Special::all();
        foreach ($specials as $s)
        {
            $score = self::calcScore($s->year, $s->month, $s->liked, $s->played);
            Redis::zAdd($key, $score, $s->id);
        }
    }
}