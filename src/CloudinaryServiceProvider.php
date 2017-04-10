<?php

namespace BrocardJr\Cloudinary;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class CloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('cloudinary', function ($app, $config) {
            return new Filesystem( new CloudinaryAdapter($config) );
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerImageBuilder();
        $this->app->alias('image', Image::class);
    }

    /**
     *
     */
    protected function registerImageBuilder()
    {
        $this->app->bind('image', function ($app) {
            return new Image($app['config']);
        });
    }


}
