<?php

namespace BomberNet\LaravelExtensions\Providers;

use Illuminate\Support\ServiceProvider;
use function dirname;

class LaravelExtensionsServiceProvider extends ServiceProvider
	{
		public function register ():void
			{
			}
		
		public function boot ():void
			{
				$this->app->registerDeferredProvider (ViteServiceProvider::class);
				$this->loadViewsFrom (dirname (__DIR__).'/resources/views','laravel-extensions');
				$this->publish ();
			}
		
		protected function publish ():void
			{
				$this->publishes ([dirname (__DIR__).'/resources/views'=>resource_path ('views/vendor/laravel-extensions')],'laravel-extensions-views');
				$this->publishes ([dirname (__DIR__).'/stubs'=>base_path ('stubs')],'laravel-extensions-stubs');
			}
	}
