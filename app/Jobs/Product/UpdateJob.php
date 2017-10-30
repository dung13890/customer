<?php

namespace App\Jobs\Product;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\ImageRepository;
use App\Traits\UploadableTrait;

class UpdateJob
{
    use Dispatchable, Queueable, UploadableTrait;

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
    public function handle(ProductRepository $repository, ImageRepository $repoImage)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        if (array_has($data, 'image')) {
            if (!empty($this->item->image)) {
                $this->destroyFile($this->item->image);
            }
            $data['image'] = $this->uploadFile($data['image'], $path);
        }

        if (isset($this->attributes['category_ids'])) {
            $this->item->categories()->sync($this->attributes['category_ids']);
        }

        if ($this->attributes['image_ids'] != $this->item->images->pluck('id')->toArray()) {
            $this->item->images()->whereNotIn('id', $this->attributes['image_ids'])->delete();
            $this->item->images()->saveMany($repoImage->find($this->attributes['image_ids']));
        }

        $this->item->update($data);
    }
}
