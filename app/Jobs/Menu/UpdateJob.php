<?php

namespace App\Jobs\Menu;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\MenuRepository;

class UpdateJob
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $attributes;
    protected $item;

    public function __construct($attributes, $item)
    {
        $this->attributes = $attributes;
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuRepository $repository)
    {
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;

        $this->item->update($data);
        \Cache::flush();
    }
}
