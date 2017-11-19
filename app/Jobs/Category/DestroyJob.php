<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\CategoryRepository;
use App\Traits\UploadableTrait;

class DestroyJob
{
    use Dispatchable, Queueable, UploadableTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $repository)
    {
        if (in_array($this->id, config('common.category.id_system'))) {
            return false;
        }
        $item = $repository->find($this->id);
        if (!empty($item->image)) {
            $this->destroyFile($item->image);
        }
        if (!empty($item->banner)) {
            $this->destroyFile($item->banner);
        }
        if (!empty($item->icon)) {
            $this->destroyFile($item->icon);
        }
        \Cache::flush();
        return $repository->destroy($this->id);
    }
}
