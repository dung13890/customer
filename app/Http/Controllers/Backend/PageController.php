<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PageRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Jobs\Page\StoreJob;
use App\Jobs\Page\UpdateJob;
use App\Jobs\Page\DestroyJob;
use App\Traits\ControllableTrait;

class PageController extends BackendController
{
    use ControllableTrait;

    protected $category;
    protected $dataSelect = ['id', 'name', 'ceo_keywords', 'locked', 'slug'];
    protected $categorySelect = ['id', 'name', 'parent_id'];

    public function __construct(PageRepository $page, CategoryRepository $category)
    {
        parent::__construct($page);
        $this->category = $category->getRootByType('page', $this->categorySelect);
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->renderOptions();
        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params, function ($query, $params) {
                if (array_has($params, 'category_id') && $params['category_id']) {
                    $query->byCategory($params['category_id']);
                }
            });

            return $this->columnDatatable($datatables)->make(true);
        }

        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();
        $this->renderOptions();

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->validation($request, __FUNCTION__);
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            $this->dispatch(new StoreJob($data));
        }, __FUNCTION__);
    }

    public function edit($id)
    {
        parent::__edit($id);
        $this->renderOptions();

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatch(new UpdateJob($data, $item));
        }, __FUNCTION__);
    }

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }

    protected function renderOptions()
    {
        $data = [];
        foreach ($this->category as $item) {
            $data[$item->name] = count($item->children)
                ? $item->children->pluck('name', 'id')->toArray()
                : [];
        }

        $this->compacts['categories'] = $data;
    }
}
