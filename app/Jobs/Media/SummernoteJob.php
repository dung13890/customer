<?php

namespace App\Jobs\Media;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\UploadableTrait;

class SummernoteJob
{
    use Dispatchable, Queueable, UploadableTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = 'summernote';
        if (isset($this->attributes['image'])) {
            return $this->uploadFile($this->attributes['image'], $path);
        }
    }
}
