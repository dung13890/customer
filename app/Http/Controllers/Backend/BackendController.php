<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use Yajra\DataTables\EloquentDataTable;
use DB;
use Exception;
use Illuminate\Http\Response;
use Log;

class BackendController extends AbstractController
{
    protected $guard = 'backend';

    protected $prefix = 'backend.';

    protected $view;

    protected $dataSelect = ['*'];

    protected $e = [
        'status' => true,
        'message' => null,
    ];

    protected function viewRender($data = [], $view = null)
    {
        $view = $view ?: $this->view;
        $compacts = array_merge($this->compacts, $data);

        return view($this->prefix . $view, $compacts);
    }

    protected function filterDatatable(EloquentDataTable $datatables, array $params, callable $callback = null)
    {
        return $datatables->filter(function ($query) use ($params, $callback) {
            if (array_has($params, 'keywords')) {
                $query->byKeywords($params['keywords']);
            }
            if (is_callable($callback)) {
                call_user_func_array($callback, [$query, $params]);
            }
        });
    }

    protected function columnDatatable(EloquentDataTable $datatables)
    {
        return $datatables->addColumn('actions', function ($item) {
            $actions['show'] = [
                'uri' => route($this->prefix . $this->repositoryName . '.show', $item->id),
                'label' => __('repositories.title.show'),
            ];
            if ($this->user->can('edit', $item)) {
                $actions['edit'] = [
                    'uri' => route($this->prefix . $this->repositoryName . '.edit', $item->id),
                    'label' => __('repositories.title.edit'),
                ];
            }
            if ($this->user->can('destroy', $item)) {
                $actions['delete'] = [
                    'uri' => route($this->prefix . $this->repositoryName . '.destroy', $item->id),
                    'label' => __('repositories.title.delete'),
                ];
            }

            return $actions;
        });
    }

    protected function doRequest(callable $callback, $action, $message = false, $redirect = null)
    {
        DB::beginTransaction();
        try {
            $this->e['message'] = [__("repositories.actions.{$action}.successfully")];
            if (is_callable($callback)) {
                call_user_func_array($callback, []);
            }
            DB::commit();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            if (is_string($errorMessage)) {
                $errorMessage = [$e->getMessage()];
            }
            Log::info($errorMessage);
            DB::rollBack();
            $this->e['status'] = false;
            $this->e['message'] = $message ? $errorMessage : [__("repositories.actions.{$action}.unsuccessfully")];
        }
        if (\Request::ajax()) {
            return $this->e['status']
                ? response()->json($this->e)
                : response()->json($this->e, Response::HTTP_PAYMENT_REQUIRED);
        }
        $redirect = $redirect ?: route($this->prefix . $this->repositoryName . '.index');
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }

    public function __index()
    {
        $this->view = $this->repositoryName . '.index';
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.index");
    }

    public function __create()
    {
        $this->view = $this->repositoryName . '.create';
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.create");
    }

    public function __show($id)
    {
        $this->view = $this->repositoryName . '.show';
        $this->compacts['item'] = $this->repository->find($id);
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.show");
    }

    public function __edit($id)
    {
        $this->view = $this->repositoryName . '.edit';
        $this->compacts['item'] = $this->repository->find($id);
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.edit");
    }
}
