<!doctype html>
<html lang="{{config ('app.locale')}}">
	<x-laravel-extensions::app.head>
		<x-slot name="title">{{trim (config ('app.name').(($title??null)?" - $title":null))}}</x-slot>
		<x-slot name="meta">{{$meta??null}}</x-slot>
		<x-slot name="styles">{{$styles??null}}</x-slot>
		<x-slot name="scripts">{{$scripts??null}}</x-slot>
	</x-laravel-extensions::app.head>
	<x-laravel-extensions::app.body {{$attributes}}>
		{{$slot}}
	</x-laravel-extensions::app.body>
</html>
