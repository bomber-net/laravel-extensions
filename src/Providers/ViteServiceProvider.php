<?php

namespace BomberNet\LaravelExtensions\Providers;

use Illuminate\Support\ServiceProvider;
use BomberNet\LaravelExtensions\Support\Vite;

class ViteServiceProvider extends ServiceProvider
	{
		public function register ():void
			{
				$this->mergeConfigFrom (dirname (__DIR__).'/config/vite.php','vite');
				$this->app->singleton (Vite::class,fn ()=>new Vite (config ('vite')));
			}
		
		public function boot ():void
			{
				$this->publishes ([dirname (__DIR__).'/config/vite.php'=>config_path ('vite.php')],'laravel-extensions-vite-config');
			}
	}
