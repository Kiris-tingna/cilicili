<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Services\UuidService;

use View;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('web', 'Cili.Cili');
        View::composer('components.html.message', 'App\Http\Composers\MessageComposer');
        View::composer('components.html.timeboard', 'App\Http\Composers\TimeBoardComposer');
        View::composer('components.html.postaside', 'App\Http\Composers\PostAsideComposer');
        Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
