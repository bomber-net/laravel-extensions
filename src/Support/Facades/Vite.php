<?php

namespace BomberNet\LaravelExtensions\Support\Facades;

use BomberNet\LaravelExtensions\Support\Vite as Accessor;
use Illuminate\Support\Facades\Vite as Facade;

/**
 * @method static string getBuildDirectory ()
 */
class Vite extends Facade
	{
		protected static function getFacadeAccessor ():string
			{
				return Accessor::class;
			}
	}
