<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CommentRepository;
use App\Jobs\Comment\DestroyJob;
use App\Jobs\Comment\UpdateJob;

class CommentController extends BackendController
{
    protected $dataSelect = ['id', 'name', 'email', 'content', 'locked', 'created_at', 'url'];

    public function __construct(CommentRepository $comment)
    {
        parent::__construct($comment);
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['types'] = [
            \App\Eloquent\Page::class => __('repositories.page.name'),
            \App\Eloquent\Post::class => __('repositories.post.name'),
            \App\Eloquent\Product::class => __('repositories.product.name'),
        ];

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();
            $datatables = \DataTables::of($this->repository->datatables($this->dataSelect));
            $this->filterDatatable($datatables, $params, function ($query, $params) {
                if (array_has($params, 'type') && $params['type']) {
                    $query->byType($params['type']);
                }
            });

            return $datatables->addColumn('actions', function ($item) {
                return [
                    'edit' => [
                        'uri' => route($this->prefix . 'comment.edit', $item->id),
                        'label' => __('repositories.title.edit'),
                    ],
                    'delete' => [
                        'uri' => route($this->prefix . 'comment.destroy', $item->id),
                        'label' => __('repositories.title.delete'),
                    ]
                ];
            })->make(true);
        }

        return $this->viewRender();
    }

    public function edit($id)
    {
        parent::__edit($id);

        return $this->viewRender();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->doRequest(function () use ($data, $id) {
            return $this->dispatch(new UpdateJob($data, $id));
        }, __FUNCTION__);
    }

    public function destroy($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatch(new DestroyJob($id));
        }, __FUNCTION__);
    }
}
