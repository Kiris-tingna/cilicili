<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $cate;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $cate
     */
    public function __construct(CategoryRepository $cate)
    {
        $this->cate = $cate;
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $cates = $this->cate->Show();

        return view('admin.category')->with('cates', $cates);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getUp($id)
    {
        $bool = $this->cate->MoveUp($id);

        return redirect('/cate/index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getDown($id)
    {
        $bool = $this->cate->MoveDown($id);

        return redirect('/cate/index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(Request $request)
    {
        $band = $request->get('band');

        $slug = $request->get('slug');

        $this->cate->MakeRoot(['band'=>$band, 'slug'=>$slug]);

        return redirect('/cate/index');
    }
    /**
     * 节点成为根节点
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getRoot(Request $request)
    {
        $id = $request->get('id');

        $this->cate->ToBeRoot($id);

        return redirect('/cate/index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postInsert(Request $request)
    {
        $pid = $request->get('pid');

        $band = $request->get('band');

        $slug = $request->get('slug');

        $this->cate->MakeChild($pid, ['band'=>$band, 'slug'=>$slug]);

        return redirect('/cate/index');
    }

    public function getMake()
    {
        $this->cate->Move(2, 1);
    }

}
