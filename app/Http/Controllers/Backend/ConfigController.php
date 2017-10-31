<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\ConfigRepository;
use Illuminate\Http\Request;
use App\Jobs\Config\StoreJob;
use App\Traits\ControllableTrait;

class ConfigController extends BackendController
{
    use ControllableTrait;

    protected $dataSelect = ['key', 'value'];

    public function __construct(ConfigRepository $config)
    {
        parent::__construct($config);
    }

    public function index()
    {
        parent::__index();
        $this->compacts['items'] = $this->repository->getData($this->dataSelect);
        $this->view = $this->repositoryName . '.create';

        return $this->viewRender();
    }

    public function store(Request $request)
    {
        $this->validation($request, __FUNCTION__);
        $data = $request->only([
            'name',
            'keywords',
            'description',
            'facebook',
            'youtube',
            'twitter',
            'whatsapp',
            'instagram',
            'email',
            'phone',
            'fax',
            'slogan',
            'address',
            'copyright',
            'factory',
            'map',
            'popup',
            'logo',
            'introduce',
        ]);

        return $this->doRequest(function () use ($data) {
            $this->dispatch(new StoreJob($data));
            \Cache::flush();
        }, 'update');
    }
}
