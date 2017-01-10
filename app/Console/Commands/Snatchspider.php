<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Str;

use App\Video;
use App\Special;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class Snatchspider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawel:one {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawel the url';

    /**
     * 爬虫客户端
     * @var null
     */
    protected $client = null;

    protected $crawler = null;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
        $gc = new GuzzleClient(['timeout'  => 2.0]);
        $this->client->setClient($gc);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $this->crawler = $this->client->request('GET', $url);
        $result = [];

        $this->snatch($result);
        $this->store($result);
//        $this->update();
    }


    public function snatch(& $result)
    {
        $result['title'] = $this->crawler->filter('.info-title')->attr('title');
        $result['content'] = $this->crawler->filter('.info-desc')->text();
        $result['picture'] = $this->crawler->filter('.bangumi-preview img')->attr('src');
        $result['state']  = $this->crawler->filter('.info-update span')->eq(1)->text();
        $result['area'] = '日本';

        $time = $this->crawler->filter('.info-update span')->eq(0)->text();
        $reg = '/\d+/';
        if(preg_match_all($reg, $time, $match))
        {
            $result['year']  = $match[0][0];
            $result['month'] = $match[0][1];
        }

        $result['weekday'] = 6;
    }

    /**
     * @return null
     */
    public function store($arr)
    {
        // 合集表
        $item = Special::firstOrCreate([
            'name'      =>  $arr['title'],
            'area'      =>  $arr['area'],
            'picture_uri'=> $arr['picture'],
            'description'=> $arr['content'],
            'year'      =>  $arr['year'],
            'month'     =>  $arr['month'],
            'weekday'   =>  $arr['weekday'],
            'state'     =>  $arr['state'],
            'played'    => 0,
            'commented' => 0,
            'liked'     => 0
        ]);
        $id = $item->id;
//        $id = 5;
        if($id){
            // 分集表
            $this->crawler->filter('.complete-list .v1-bangumi-list-part-child>a')->each(function($node , $i) use ($id) {
                $vid = Video::insertGetId(array(
                    'episode'=> $i+1,
                    'name'=> $node->attr('title'),
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
        }
    }

    public function update()
    {
        $ids = Special::all('id')->pluck('id');
        foreach ($ids as $id)
        {
            $particles = Video::where('special_id', $id)->count();

            if($particles)
            {
                print($id);
                print($particles);
                Special::where('id', $id)->update(array('particles'=>$particles));
            }
        }

    }
}
