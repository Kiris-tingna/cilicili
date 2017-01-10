<?php

namespace App\Providers;
use Collective\Html\FormBuilder;
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        FormBuilder::component('bsText', 'components.form.text', ['name', 'value' => '', 'attributes'=> []]);
        FormBuilder::component('bsDate', 'components.form.date', ['name', 'value'=>'', 'attributes'=>[]]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
