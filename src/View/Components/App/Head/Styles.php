<?php

namespace BomberNet\LaravelExtensions\View\Components\App\Head;

use Illuminate\View\Component;

class Styles extends Component
	{
		public function render ():string
			{
				return '{{$slot}}';
			}
	}
