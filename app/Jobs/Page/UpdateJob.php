<?php

namespace App\Jobs\Page;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Contracts\Repositories\PageRepository;
use App\Traits\UploadableTrait;
use Carbon\Carbon;

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
    public function handle(PageRepository $repository)
    {
        $path = strtolower(class_basename($repository->model));
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        $data['is_home'] = $data['is_home'] ?? false;
        $data['create_dt'] = Carbon::createFromFormat(config('common.create_dt.format'), $data['create_dt']);
        if (array_has($data, 'image')) {
            if (!empty($this->item->image)) {
                $this->destroyFile($this->item->image);
            }
            $data['image'] = $this->uploadFile($data['image'], $path);
        }

        if (array_has($data, 'icon')) {
            if (!empty($this->item->icon)) {
                $this->destroyFile($this->item->icon);
            }
            $data['icon'] = $this->uploadFile($data['icon'], $path);
        }

        if (array_has($data, 'file')) {
            if (!empty($this->item->file)) {
                $this->destroyFile($this->item->file, 'public');
            }
            $data['file'] = $this->uploadFile($data['file'], $path, 'public');
        }

        if (array_has($data, 'attributes')) {
            $data['attributes'] = array_values(array_filter(array_map('array_filter', $data['attributes'])));
        }

        $this->item->update($data);
    }
}
