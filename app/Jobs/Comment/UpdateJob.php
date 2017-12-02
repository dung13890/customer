<?php

namespace App\Jobs\Comment;

use Illuminate\Bus\Queueable;
use App\Contracts\Repositories\CommentRepository;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateJob
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $attributes;
    protected $id;

    public function __construct(array $attributes, $id)
    {
        $this->attributes = $attributes;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CommentRepository $repository)
    {
        $data = array_only($this->attributes, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        $data['is_read'] = true;
        \Cache::forget('countComment');
        $repository->update($data, $this->id);
    }
}
