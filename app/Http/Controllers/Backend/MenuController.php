<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Jobs\Menu\StoreJob;
use App\Jobs\Menu\UpdateJob;
use App\Jobs\Menu\DestroyJob;
use App\Traits\ControllableTrait;

class MenuController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['id', 'name', 'url', 'sort', 'locked'];

    public function __construct(MenuRepository $menu)
    {
        parent::__construct($menu);
    }

    public function index()
    {
        $this->before(__FUNCTION__);
        parent::__index();
        $this->compacts['items'] = $this->repository->getData($this->dataSelect);
        $this->compacts['types'] = array_map(function ($row) {
            return [
                'name' => __("repositories.title.{$row}"),
                'url' => $row == 'link' ? '#' : parse_url(route('menu.index', $row), PHP_URL_PATH),
                'type' => $row,
            ];
        }, config('common.menu'));

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->before(__FUNCTION__);
        $this->validation($request, __FUNCTION__);
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatch(new StoreJob($data));
        }, __FUNCTION__, false, url()->previous());
    }

    public function edit($id)
    {
        $this->before(__FUNCTION__);
        parent::__edit($id);

        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $this->before(__FUNCTION__);
        $item = $this->repository->find($id);
        $this->validation($request, __FUNCTION__, $item);
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatch(new UpdateJob($data, $item));
        }, __FUNCTION__, false, url()->previous());
    }

    public function destroy($id)
    {
        $this->before(__FUNCTION__);
        return $this->doRequest(function () use ($id) {
            $status = $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }
}
