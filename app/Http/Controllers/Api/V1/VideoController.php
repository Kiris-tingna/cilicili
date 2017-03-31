<?php

namespace App\Http\Controllers\Api\V1;

use Request;
use GuzzleHttp\Client;

class VideoController extends BaseController
{

    public function source($aid, $page, $quality)
    {
        $g = new Client();
        $response = $g->request('GET', 'https://api.imjad.cn/bilibili?aid='.$aid.'&page='.$page.'&quality='.$quality);
        $arr = json_decode($response->getBody(), true);

        return ['status' => 200, 'message' => 'success', 'data'=>$arr['durl']['url']];
    }

}