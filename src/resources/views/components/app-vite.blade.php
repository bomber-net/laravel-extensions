<x-laravel-extensions::app {{$attributes}}>
	<x-slot name="meta">
		{{$meta??null}}
	</x-slot>
	<x-slot name="styles">
		@vite (vite_styles (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
		{{$styles??null}}
	</x-slot>
	<x-slot name="scripts">
		@vite (vite_scripts (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
		{{$scripts??null}}
	</x-slot>
	{{$slot}}
</x-laravel-extensions::app>
