<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Repositories\Eloquent\Repository;

class LikeStatEvent extends Event
{
    use SerializesModels;

    /**
     * @var Repository
     */
    public $repository;
    /**
     * @var
     */
    public $id;

    /**
     * Create a new event instance.
     *
     * @param Repository $repository
     * @param $id
     */
    public function __construct(Repository $repository, $id)
    {
        $this->repository = $repository;
        $this->id = $id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
