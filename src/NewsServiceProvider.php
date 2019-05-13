<?php
namespace Miapenso\News;

use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if (! News::boot()) {
            return ;
        }
        $this->app->booted(function () {
            News::routes(__DIR__.'/../routes/web.php');
        });
    }
}