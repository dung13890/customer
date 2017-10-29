<?php

namespace App\Jobs\Config;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\ConfigRepository;
use App\Traits\UploadableTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public function handle(ConfigRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));

        if (isset($this->attributes['logo']) && $this->attributes['logo']) {
            $this->uploadImageConfig($this->attributes['logo'], 'logo', $path);
            unset($this->attributes['logo']);
        }

        foreach ($this->attributes as $key => $value) {
            $repository->findByKey($key)->update(['value' => $value]);
        }
    }

    public function uploadImageConfig(UploadedFile $file, $key, $path)
    {
        $image = app(ConfigRepository::class)->findByKey($key);
        if (! empty($image->value)) {
            $this->destroyFile($image->value);
        }
        $src = $this->uploadFile($file, $path);
        $image->update(['value' => $src]);
    }
}
