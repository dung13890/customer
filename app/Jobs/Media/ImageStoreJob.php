<?php

namespace App\Jobs\Media;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\UploadableTrait;
use App\Contracts\Repositories\ImageRepository;
use Illuminate\Support\Str;

class ImageStoreJob
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
    public function handle(ImageRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));
        $this->attributes['name'] = Str::ascii($this->attributes['src']->getClientOriginalName());
        $this->attributes['size'] = $this->attributes['src']->getSize();
        $this->attributes['type'] = $this->attributes['src']->getMimeType();
        $this->attributes['src'] = $this->uploadFile($this->attributes['src'], $path);

        return $repository->store($this->attributes);
    }
}
