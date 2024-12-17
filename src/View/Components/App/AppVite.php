<?php

namespace BomberNet\LaravelExtensions\View\Components\App;

use Illuminate\View\Component;

class AppVite extends Component
	{
		public function render ():string
			{
				$template=<<<'TEMPLATE'
				<x-laravel-extensions::app {{$attributes}}>
					<x-slot:meta>
						{{$meta??null}}
					</x-slot>
					<x-slot:styles>
						@vite (vite_styles (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
						{{$styles??null}}
					</x-slot>
					<x-slot:scripts>
						@vite (vite_scripts (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
						{{$scripts??null}}
					</x-slot>
					{{$slot}}
				</x-laravel-extensions::app>
				TEMPLATE;
				return $template;
			}
	}
