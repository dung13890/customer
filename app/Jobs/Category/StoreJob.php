<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\CategoryRepository;
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
    public function handle(CategoryRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        $data['is_home'] = $data['is_home'] ?? false;
        $data['is_page'] = $data['is_page'] ?? false;
        $data['is_redirect'] = $data['is_redirect'] ?? false;
        if (array_has($data, 'image')) {
            $data['image'] = $this->uploadFile($data['image'], $path);
        }
        if (array_has($data, 'banner')) {
            $data['banner'] = $this->uploadFile($data['banner'], $path);
        }
        if (array_has($data, 'icon')) {
            $data['icon'] = $this->uploadFile($data['icon'], $path);
        }
        $repository->store($data);
        \Cache::flush();
    }
}
