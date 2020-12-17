<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UrlShortRepository;
use App\Interfaces\UrlShortInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UrlShortInterface::class,
            UrlShortRepository::class
        );
    }
}
