@props (['title'=>'','description'=>'','keywords'=>'','author'=>''])
<!doctype html>
<html lang="{{config ('app.locale')}}">
	<x-laravel-extensions::app.head :$description :$keywords :$author>
		<x-slot:title>{{trim (config ('app.name').(($title??null)?" - $title":null))}}</x-slot>
		<x-slot:meta>{{$meta??null}}</x-slot>
		<x-slot:styles>{{$styles??null}}</x-slot>
		<x-slot:scripts>{{$scripts??null}}</x-slot>
	</x-laravel-extensions::app.head>
	<x-laravel-extensions::app.body {{$attributes}}>
		{{$slot}}
	</x-laravel-extensions::app.body>
</html>
