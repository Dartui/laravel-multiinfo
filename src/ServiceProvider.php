<?php
namespace Dartui\Multiinfo;

use Dartui\Multiinfo\Http\Client;
use Dartui\Multiinfo\Multiinfo;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configFile(), 'multiinfo');

        $this->vendorPublish();

        $this->app->bind(Client::class, function ($app) {
            return new Client($app['config']);
        });

        $this->app->bind('multiinfo', function ($app) {
            return new Multiinfo($app['config']);
        });
    }

    protected function vendorPublish()
    {
        $this->publishes([
            $this->configFile() => config_path('multiinfo.php'),
        ]);
    }

    protected function configFile()
    {
        return __DIR__ . '/../config/multiinfo.php';
    }
}
