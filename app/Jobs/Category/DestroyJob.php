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
        if ($this->id == 1 || $this->id == 2) {
            return false;
        }
        $item = $repository->find($this->id);
        if (!empty($item->image)) {
            $this->destroyFile($item->image);
        }

        return $repository->destroy($this->id);
    }
}
