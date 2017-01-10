<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SnatchRepositories;

use App\Http\Requests;

class SnatchController extends Controller
{
    protected $spider;

    public function __construct(SnatchRepositories $spider)
    {
        $this->spider = $spider;
    }

    public function getIndex()
    {
        return view('admin.snatch');
    }

    public function postScrapy(Request $request)
    {
        $url = $request->get('url');
        $this->spider->snatch($url);
        return redirect('/snatch/index');
    }
}
