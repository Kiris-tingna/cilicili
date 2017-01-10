<?php

namespace App\Http\Controllers;

use App\Jobs\sendEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

/**
 * Class KpTelloController
 * @package App\Http\Controllers
 */
class KpTelloController extends Controller
{
    /**
     * 文件上传控制器
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('POST')) {
            // 获取文件
            $file = $request->file('files_upload');
            $uploadSuccessFlag = false;

            // 文件是否上传成功
            if ($file->isValid()) {
                $originalName = $file->getClientOriginalName();     // 原文件
                $originalExt = $file->getClientOriginalExtension(); // 扩展名
                $originalType = $file->getClientMimeType();         // mime

                $realPath = $file->getRealPath();                   // 临时绝对路劲
                $uploadFile = date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $originalExt;
                // 判断上传成功
                $uploadSuccessFlag = Storage::disk('upload')->put($uploadFile, file_get_contents($realPath));
            }

            if ($uploadSuccessFlag) {
                echo 'upload successs !';
                die();
            } else {
                echo 'upload fail!';
                die();
            }
        }
        return view('KpTello/upload');
    }

    /**
     * 队列测试控制器
     */
    public function queue()
    {
        $this->dispatch(new sendEmail('1206802260@qq.com'));
    }
}
