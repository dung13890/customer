<?php

namespace App\Jobs\Product;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\ProductRepository;
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
    public function handle(ProductRepository $repository)
    {
        $item = $repository->find($this->id);
        if (!empty($item->image)) {
            $this->destroyFile($item->image);
        }

        $item->images()->delete();

        return $repository->destroy($this->id);
    }
}
