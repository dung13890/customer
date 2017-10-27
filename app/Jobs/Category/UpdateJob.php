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
    protected $id;

    public function __construct($attributes, $id)
    {
        $this->attributes = $attributes;
        $this->id = $id;
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
        if (array_has($data, 'image')) {
            $item = $repository->find($this->id);
            if (!empty($item->image)) {
                $this->destroyFile($item->image);
            }
            $data['image'] = $this->uploadFile($data['image'], $path);
        }
        if ($this->id == 1 || $this->id == 2) {
            $data['parent_id'] = 0;
        }
        $repository->update($data, $this->id);
    }
}
