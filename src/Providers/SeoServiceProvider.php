<?php
namespace Mixdinternet\Seo\Providers;

use Illuminate\Support\ServiceProvider;
use Mixdinternet\Seo\SeoInterface;
use Mixdinternet\Seo\Seo;

class SeoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->events();

        $this->loadViews();

        $this->publish();
    }

    public function register()
    {

    }

    protected function events()
    {
        $this->app['events']->listen('eloquent.saved*', function ($model) {
            if ($model instanceof SeoInterface) {
                $seo = new Seo();

                if ($model->seo) {
                    $seo = $model->seo;
                }

                $seo->title = (request()->get('seo')['title']) ?: $model->seoTitle;
                $seo->description = (request()->get('seo')['description']) ?: $model->seoDescription;
                $seo->keywords = (request()->get('seo')['keywords']) ?: '';

                $model->seo()->save($seo);
            }
        });
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mixdinternet/seo');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/mixdinternet/seo'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../database/migrations' => base_path('database/migrations'),
        ], 'migrations');
    }
}
