<?php

namespace App\Jobs\Product;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\ImageRepository;
use App\Traits\UploadableTrait;

class StoreJob
{
    use Dispatchable, Queueable, UploadableTrait;

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
    public function handle(ProductRepository $repository, ImageRepository $repoImage)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['image'] = $this->uploadFile($data['image'], $path);

        $product = $repository->store($data);

        if (isset($this->attributes['image_ids'])) {
            $product->images()->saveMany($repoImage->findByIds($this->attributes['image_ids']));
        }

        $product->categories()->sync($this->attributes['category_ids']);
    }
}
