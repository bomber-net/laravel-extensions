<?php

namespace BomberNet\LaravelExtensions\Support;

use Illuminate\Support\Facades\Date;

class Carbon extends \Illuminate\Support\Carbon
	{
		public static function makeNotNull ($var):\Illuminate\Support\Carbon
			{
				return parent::make ($var)??Date::now ();
			}
	}
