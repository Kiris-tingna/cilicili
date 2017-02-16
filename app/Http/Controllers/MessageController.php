<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Jobs\SendMessage;

class MessageController extends Controller
{
    public function getIndex()
    {
        return view('admin.notify');
    }
    // 网站通知
    public function postNotify(Request $request)
    {
        // 1 为 admin 用户
        $from = 1;
        $tos = User::all()->pluck('id')->forget(0)->toArray();

        $title = $request->get('title');
        $content = $request->get('content');

        $this->dispatch(new SendMessage($from, $tos, $title, $content));
        return redirect('/message/index');
    }

    // 私行
//    public function chat(Request $request)
//    {
//
//    }
}
