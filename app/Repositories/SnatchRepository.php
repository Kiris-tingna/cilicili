<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/1/9
 * Time: 18:21
 */

namespace App\Repositories;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Pool;
use Carbon\Carbon;
use App\Special;
use App\Video;

class SnatchRepository
{
    protected $client;
    protected $crawler;
    protected $guzzle;
    public $Bili;
//    protected $users = ['1'=> 'zhengjinghua', '2'=>'NauxLiu', '3'=>'CycloneAxe', '4'=>'appleboy','5'=>'Aufree'];
//    public $res;
    public function __construct(Client $goutte, GuzzleClient $guzzle)
    {
        $this->client = $goutte;
        $this->guzzle = $guzzle;
        $this->client->setClient($guzzle);
    }

    public function snatch($url)
    {
//         $r = function (){
//            foreach ($this->users as $key => $user) {
//
//                $uri = 'https://api.github.com/users/' . $user;
//                yield function() use ($uri) {
//                    return $this->guzzle->getAsync($uri);
//                };
//            }
//        };
//
//        $pool = new Pool($this->guzzle, $r(), [
//            'concurrency' => 2 ,
//            'fulfilled'   => function ($response, $index){
//                $res = json_decode($response->getBody()->getContents());
//                $this->res[] = $res;
//            },
//            'rejected' => function ($reason, $index){
//                $this->res[] = $reason;
//            },
//        ]);
//
//        $pool->promise()->wait();
//        dump($this->res);
//        die();
//        return true;
        $this->registerBLSpider($url);
        return true;
    }

    public function sync($sid, $url)
    {
        $sp = Special::find($sid);
        $this->crawler = $this->client->request('GET', $url);
        $videos = $this->crawler->filter('.complete-list .v1-bangumi-list-part-child>a');
        $current_sps = $sp->particles;

        $videos->each(function ($node, $i) use ($sid, $current_sps) {
            if ($i + 1 > $current_sps) {
                $vid = Video::firstOrCreate(array(
                    'episode' => $i + 1,
                    'name' => $node->attr('title'),
                    'special_id' => $sid,
                    'picture_uri' => $node->filter('.img-wrp img')->attr('src'),
                    'played' => 0,
                    'commented' => 0,
                    'liked' => 0,
                    'created_at' => Carbon::now()
                ))->id;
                Video::where('id', $vid)->update(array('av' => 'av' . str_pad($vid, 5, "0", STR_PAD_LEFT)));
            }
        });

        Special::where('id', $sid)->update(array('particles' => Video::where('special_id', $sid)->count()));

        return true;
    }

    public function address($sid, $url)
    {
        $this->crawler = $this->client->request('GET', $url);
        $videos = $this->crawler->filter('.complete-list .v1-bangumi-list-part-child');
        $videos->each(function ($node, $i) use ($sid) {
            $infomation = json_decode($this->guzzle->request('GET',
                'http://bangumi.bilibili.com/web_api/episode/'.$node->attr('data-episode-id').'.json')->getBody(),
                true);
            Video::where('episode', $i + 1)->where('special_id', $sid)->update(['source_uri'=> $infomation['result']['currentEpisode']['avId']]);
        });
    }

    public function registerBLSpider($url)
    {
        $this->crawler = $this->client->request('GET', $url);
        /**
         * time part
         */
        $this->BiliBiliTime($this->Bili);
        /**
         * special part
         */
        $this->BiliBiliAnimate($this->Bili);
        /**
         * video part
         */
        $this->BiliBiliVideos($this->Bili);

        return true;
    }

    public function BiliBiliTime(&$singleton)
    {
        $time = $this->crawler->filter('.info-update span')->eq(0)->text();
        $reg = '/\d+/';
        $timeMatch = [];

        if(! preg_match_all($reg, $time, $timeMatch))
        {
            $timeMatch[0][0] = '0000';
            $timeMatch[0][1] = '00';
        }

        $singleton['year'] = $timeMatch[0][0];
        $singleton['month'] = $timeMatch[0][1];

        return true;
    }

    public function BiliBiliAnimate(&$singleton)
    {
        $singleton['id'] = Special::firstOrCreate([
            'name'      =>  $this->crawler->filter('.info-title')->attr('title'),
            'area'      =>  '日本',
            'picture_uri'=> $this->crawler->filter('.bangumi-preview img')->attr('src'),
            'description'=> $this->crawler->filter('.info-desc')->text(),
            'year'      =>  $singleton['year'],
            'month'     =>  $singleton['month'],
            'weekday'   =>  6,
            'state'     =>  $this->crawler->filter('.info-update span')->eq(1)->text(),
            'played'    =>  0,
            'commented' =>  0,
            'liked'     =>  0
        ])->id;

        return true;
    }

    public function BiliBiliVideos(&$singleton)
    {
        $id = $singleton['id'];
        $this->crawler->filter('.complete-list .v1-bangumi-list-part-child>a')->each(function($node , $i) use ($id) {
            $vid = Video::insertGetId(array(
                'episode'=> $i+1,
                'name'  => $node->attr('title'),
                'special_id' => $id,
                'picture_uri'=>$node->filter('.img-wrp img')->attr('src'),
                'played'    => 0,
                'commented' => 0,
                'liked'     =>  0,
                'created_at' => Carbon::now()
            ));
            Video::where('id', $vid)->update(array('av' => 'av'.str_pad($vid, 5 ,"0",STR_PAD_LEFT)));
        });
        Special::where('id', $id)->update(array('particles' => Video::where('special_id', $id)->count()));

        return true;
    }
}