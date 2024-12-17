<?php

namespace BomberNet\LaravelExtensions\View\Components\App\Head;

use Illuminate\View\Component;

class Scripts extends Component
	{
		public function render ():string
			{
				return '{{$slot}}';
			}
	}
