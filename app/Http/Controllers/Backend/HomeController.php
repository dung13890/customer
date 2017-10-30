<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ContactRepository;
use App\Jobs\Contact\DestroyJob;
use App\Contracts\Services\MediaInterface;

class HomeController extends BackendController
{
    public function __construct(ContactRepository $contact)
    {
        parent::__construct($contact);
    }

    protected $dataSelect = ['id', 'name', 'email', 'phone', 'description'];

    public function index(Request $request)
    {
        $this->compacts['heading'] = __('repositories.home.name');
        $this->view = 'home.index';

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params);

            return $datatables->addColumn('actions', function ($item) {
                return [
                    'delete' => [
                        'uri' => route($this->prefix . 'home.destroy', $item->id),
                        'label' => __('repositories.title.delete'),
                    ]
                ];
            })->make(true);
        }

        return $this->viewRender();
    }

    public function show($id)
    {
        $this->compacts['heading'] = __('repositories.home.name');
        $this->view = 'home.show';

        $this->compacts['item'] = $this->repository->find($id);

        return $this->viewRender();
    }

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }

    public function summernoteImage(Request $request, MediaInterface $service)
    {
        $path = $service->summernote($request->all());

        return [
            'url' => route('image', app()['glide.builder']->getUrl($path))
        ];
    }
}
