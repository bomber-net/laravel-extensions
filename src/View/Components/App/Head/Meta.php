<?php

namespace BomberNet\LaravelExtensions\View\Components\App\Head;

use Illuminate\View\Component;

class Meta extends Component
	{
		public readonly string $description;
		public readonly string $keywords;
		public readonly string $author;
		
		public function __construct (?string $description,string|array|null $keywords,?string $author)
			{
				$this->description=$description??'';
				$this->keywords=is_array ($keywords)?implode (' ',$keywords):$keywords??'';
				$this->author=$author??'';
			}
		
		public function render ():string
			{
				$template=<<<'TEMPLATE'
				<meta charset="utf-8">
				<meta name="csrf-token" content="{{csrf_token ()}}">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="{{$description}}">
				<meta name="keywords" content="{{$keywords}}">
				<meta name="author" content="{{$author}}">
				{{$slot}}
				TEMPLATE;
				return $template;
			}
	}
