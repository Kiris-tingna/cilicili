<?php

namespace App\Events;

use App\Events\Event;
use App\Repositories\Eloquent\Repository;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ViewCountsEvent extends Event
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
     * ViewCountsEvent constructor.
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
