<?php

namespace App\Jobs\Page;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\PageRepository;
use App\Traits\UploadableTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

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
    public function handle(PageRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['create_dt'] = Carbon::createFromFormat(config('common.create_dt.format'), $data['create_dt']);

        if (array_has($data, 'image')) {
            $data['image'] = $this->uploadFile($data['image'], $path);
        }

        if (array_has($data, 'icon')) {
            $data['icon'] = $this->uploadFile($data['icon'], $path);
        }

        if (array_has($data, 'file')) {
            $data['file'] = $this->uploadFile($data['file'], $path, 'public');
        }

        $repository->store($data);
    }
}
