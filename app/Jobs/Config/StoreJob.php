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

        if (isset($this->attributes['popup_img']) && $this->attributes['popup_img']) {
            $this->uploadImageConfig($this->attributes['popup_img'], 'popup_img', $path);
            unset($this->attributes['popup_img']);
        }

        if (!isset($this->attributes['popup_img_flg'])) {
            $this->attributes['popup_img_flg'] = 0;
        }

        if (!isset($this->attributes['popup_disp_flg'])) {
            $this->attributes['popup_disp_flg'] = 0;
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
