<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\CategoryRepository;
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
    public function handle(CategoryRepository $repository)
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

        if (array_has($data, 'banner')) {
            if (!empty($this->item->banner)) {
                $this->destroyFile($this->item->banner);
            }
            $data['banner'] = $this->uploadFile($data['banner'], $path);
        }
        if ($this->item->id == 1 || $this->item->id == 2) {
            $data['parent_id'] = 0;
        }
        $this->item->update($data);
    }
}
