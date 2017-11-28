<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ContactRepository;
use App\Contracts\Repositories\CommentRepository;
use App\Jobs\Contact\DestroyJob;
use App\Contracts\Services\MediaInterface;

class HomeController extends BackendController
{
    protected $commentRepo;
    protected $dataSelect = ['id', 'name', 'email', 'phone', 'description'];

    public function __construct(ContactRepository $contact, CommentRepository $comment)
    {
        parent::__construct($contact);
        $this->commentRepo = $comment;
    }


    public function index(Request $request)
    {
        $this->before(__FUNCTION__);
        $this->compacts['heading'] = __('repositories.home.name');
        $this->view = 'home.index';

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params);

            return $datatables->addColumn('actions', function ($item) {
                return $this->user->can('destroy', $item) ? [
                    'delete' => [
                        'uri' => route($this->prefix . 'home.destroy', $item->id),
                        'label' => __('repositories.title.delete'),
                    ]
                ] : [];
            })->make(true);
        }

        return $this->viewRender();
    }

    public function show($id)
    {
        $this->before(__FUNCTION__);
        $this->compacts['heading'] = __('repositories.home.name');
        $this->view = 'home.show';

        $this->compacts['item'] = $this->repository->find($id);

        return $this->viewRender();
    }

    public function destroy($id)
    {
        $this->before(__FUNCTION__);
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

    public function readComment($id)
    {
        $comment = $this->commentRepo->find($id);
        $comment->update(['is_read' => true]);
        \Cache::forget('countComment');
        return redirect($comment->url);
    }
}
