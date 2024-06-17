<?php

namespace BomberNet\LaravelExtensions\Support;
use Illuminate\Foundation\Vite as Foundation;

class Vite extends Foundation
	{
		public function __construct (array $config)
			{
				if (is_string ($buildDirectory=$config['buildDirectory']??null)) $this->buildDirectory=$buildDirectory;
			}
		
		public function getBuildDirectory ():string
			{
				return $this->buildDirectory;
			}
	}
