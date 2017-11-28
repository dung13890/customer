<?php

namespace App\Jobs\Comment;

use Illuminate\Bus\Queueable;
use App\Contracts\Repositories\CommentRepository;
use Illuminate\Foundation\Bus\Dispatchable;

class DestroyJob
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CommentRepository $repository)
    {
        \Cache::forget('countComment');
        return $repository->destroy($this->id);
    }
}
