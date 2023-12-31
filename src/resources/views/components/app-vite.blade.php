<!doctype html>
<html lang="{{config ('app.locale')}}">
	<x-laravel-extensions::app.head>
		<x-slot name="title">{{trim (config ('app.name').(($title??null)?" - $title":null))}}</x-slot>
		<x-slot name="meta">{{$meta??null}}</x-slot>
		<x-slot name="styles">
			@vite (vite_styles (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
			{{$styles??null}}
		</x-slot>
		<x-slot name="scripts">
			@vite (vite_scripts (\BomberNet\LaravelExtensions\Support\Facades\Vite::getBuildDirectory ()))
			{{$scripts??null}}
		</x-slot>
	</x-laravel-extensions::app.head>
	<x-laravel-extensions::app.body {{$attributes}}>
		{{$slot}}
	</x-laravel-extensions::app.body>
</html>
