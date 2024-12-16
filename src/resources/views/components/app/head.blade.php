@props (['title'=>'','description'=>'','keywords'=>'','author'=>''])
<head>
	<title>{{$title}}</title>
	<x-laravel-extensions::app.head.meta :$description :$keywords :$author>
		{{$meta??null}}
	</x-laravel-extensions::app.head.meta>
	<x-laravel-extensions::app.head.styles>
		{{$styles??null}}
	</x-laravel-extensions::app.head.styles>
	<x-laravel-extensions::app.head.scripts>
		{{$scripts??null}}
	</x-laravel-extensions::app.head.scripts>
</head>
