<?php

namespace BomberNet\LaravelExtensions\View\Components\App\Head;

use Illuminate\View\Component;

class Head extends Component
	{
		public readonly string $title;
		public readonly string $description;
		public readonly string $keywords;
		public readonly string $author;
		
		public function __construct (?string $title,?string $description,string|array|null $keywords,?string $author)
			{
				$this->title=$title??'';
				$this->description=$description??'';
				$this->keywords=is_array ($keywords)?implode (' ',$keywords):$keywords??'';
				$this->author=$author??'';
			}
		
		public function render ():string
			{
				$template=<<<'TEMPLATE'
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
				TEMPLATE;
				return $template;
			}
	}
