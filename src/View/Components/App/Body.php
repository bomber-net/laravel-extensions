<?php

namespace BomberNet\LaravelExtensions\View\Components\App;

use Illuminate\View\Component;

class Body extends Component
	{
		public function render ():string
			{
				$tamplate=<<<'TEMPLATE'
				<body {{$attributes}}>
					{{$slot}}
				</body>
				TEMPLATE;
				return $tamplate;
			}
	}
