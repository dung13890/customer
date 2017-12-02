<?php

namespace App\Jobs\Post;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\PostRepository;
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
    public function handle(PostRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;

        if (array_has($data, 'image')) {
            $data['image'] = $this->uploadFile($data['image'], $path);
        }

        return $repository->store($data);
    }
}
