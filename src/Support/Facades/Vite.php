<?php

namespace BomberNet\LaravelExtensions\Support\Facades;
use Illuminate\Support\Facades\Vite as Facade;

/**
 * @method static string getBuildDirectory ()
 */
class Vite extends Facade
	{
		protected static function getFacadeAccessor ()
			{
				return \BomberNet\LaravelExtensions\Support\Vite::class;
			}
	}
