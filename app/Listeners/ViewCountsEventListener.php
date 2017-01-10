<?php

namespace App\Listeners;

use App\Events\ViewCountsEvent;
use Illuminate\Session\Store;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViewCountsEventListener
{
    // 过期设置
    const expire = 120;

    protected $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  ViewCountsEvent  $event
     * @return void
     */
    public function handle(ViewCountsEvent $event)
    {
        // repostory
        $repository = $event->repository;
        $id = $event->id;

        //先进行判断是否已经查看过
        if (!$this->hasViewedRecord($id)) {

            $repository->ViewedThisOne($id);

            //看过之后将保存到 Session
            $this->storeViewedRecord($id);
        }
    }
    protected function hasViewedRecord($id)
    {
        $last_time = $this->getViewedRecord($id);
        // pv 策略
        if((!empty($last_time)) && time() - $last_time < self::expire){
            return true;
        }else{
            return false;
        }
    }

    protected function getViewedRecord($id)
    {
        return $this->session->get('viewed_special_'.$id, []);
    }

    protected function storeViewedRecord($id)
    {
        $key = 'viewed_special_'.$id;

        $this->session->put($key, time());
    }
}
