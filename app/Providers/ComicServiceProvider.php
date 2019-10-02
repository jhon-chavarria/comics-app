<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Model\ComicRepositoryInterface',
            'App\Model\ComicRepositoryInterfaceImpl'
        );
    }
}
