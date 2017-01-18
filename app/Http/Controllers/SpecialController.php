<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\SpecialRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class SpecialController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $cate;
    /**
     * @var SpecialRepository
     */
    protected $special;

    /**
     * SpecialController constructor.
     * @param CategoryRepository $cate
     * @param SpecialRepository $special
     */
    public function __construct(CategoryRepository $cate, SpecialRepository $special)
    {
        $this->cate = $cate;
        $this->special = $special;
    }

    public function getIndex()
    {
        $specials = $this->special->allPaginated(10);
        $cates = $this->cate->all();
        return view('admin.special', compact('specials', 'cates'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request)
    {
        if($request->has('id'))
        {
            $id = $request->get('id');
        }else{
            return response()->json(array(
                'status' => 600,
                'message' => 'this request param is not right',
            ));
        }
        return response()->json(array(
            'status' => 200,
            'data' => $this->special->findOrFail($id)->categories->toArray(),
            'message' => 'no error'
        ));
    }
    /**
     * 合集数组想栏目添加和跟新操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postInsert(Request $request)
    {
        $this->cate->AttachSpecial($request->get('id'), $request->get('sid'));
        return response()->json(array(
            'status' => 200,
            'message' => 'success',
        ));
    }

    public function postUpdate(Request $request)
    {
        $this->special->SyncSpecial($request->get('id'), $request->get('cid'));
        return response()->json(array(
            'status' => 200,
            'message' => 'success',
        ));
    }
}
