<?php

namespace Aitaddihamza\StatusAuditor\Providers;

use Illuminate\Support\ServiceProvider;

class StatusAuditorServiceProvider extends ServiceProvider
{
  public function register(): void {}

  public function boot(): void
  {
    if ($this->app->runningInConsole()) {
      $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
  }
}
