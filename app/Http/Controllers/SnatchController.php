<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SnatchRepository;

use App\Http\Requests;

class SnatchController extends Controller
{
    protected $spider;

    public function __construct(SnatchRepository $spider)
    {
        $this->spider = $spider;
        $this->middleware('auth');
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

    public function getSync($id)
    {
        return view('admin.syncsp')->with('id', $id);
    }

    public function postSync(Request $request)
    {
        $sid = $request->get('id');
        $url = $request->get('url');

        $this->spider->sync($sid, $url);
        return redirect('/special/index');
    }
}
