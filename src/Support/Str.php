<?php

namespace BomberNet\LaravelExtensions\Support;

class Str extends \Illuminate\Support\Str
	{
		public static function contains ($haystack,$needles,$ignoreCase=false):bool
			{
				$haystack??='';
				$needles??='';
				return parent::contains ($haystack,$needles,$ignoreCase);
			}
	}
