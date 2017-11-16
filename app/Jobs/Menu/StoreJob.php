<?php

namespace App\Jobs\Menu;

use Illuminate\Bus\Queueable;
use App\Contracts\Repositories\MenuRepository;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreJob
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuRepository $repository)
    {
        $data = array_only($this->attributes, $repository->model->getFillable());
        $repository->store($data);
        \Cache::flush();
    }
}
