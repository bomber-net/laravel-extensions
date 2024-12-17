<?php

namespace BomberNet\LaravelExtensions\View\Components;

use Illuminate\View\Component;

class App extends Component
	{
		public readonly string $title;
		public readonly string $description;
		public readonly string $keywords;
		public readonly string $author;
		
		public function __construct (?string $title,?string $description,string|array|null $keywords,?string $author)
			{
				$this->title=trim (config ('app.name').(($title??null)?" - $title":null));
				$this->description=$description??'';
				$this->keywords=is_array ($keywords)?implode (' ',$keywords):$keywords??'';
				$this->author=$author??'';
			}
		
		public function render ():string
			{
				$template=<<<'TEMPLATE'
				<!doctype html>
				<html lang="{{config ('app.locale')}}">
					<x-laravel-extensions::app.head :$title :$description :$keywords :$author>
						<x-slot:meta>{{$meta??null}}</x-slot>
						<x-slot:styles>{{$styles??null}}</x-slot>
						<x-slot:scripts>{{$scripts??null}}</x-slot>
					</x-laravel-extensions::app.head>
					<x-laravel-extensions::app.body {{$attributes}}>
						{{$slot}}
					</x-laravel-extensions::app.body>
				</html>
				TEMPLATE;
				return $template;
			}
	}
