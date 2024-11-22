<?php

namespace BomberNet\LaravelExtensions\Enuma;

use BomberNet\LaravelExtensions\Support\Arr;
use ReflectionClass;
use Throwable;
use ValueError;
use function count;

trait EnumBaseTrait
	{
		public static function values ():array
			{
				return Arr::pluck (self::cases (),'value');
			}
		
		public static function names ():array
			{
				return Arr::pluck (self::cases (),'name');
			}
		
		public static function map (bool $valueAsKey=false):array
			{
				return array_reduce (self::cases (),static fn (array $map,self $item) => $map+[$valueAsKey?$item->title ():$item->name=>$item->title ()],[]);
			}
		
		public static function count ():int
			{
				return count (self::cases ());
			}
		
		public static function fromOrd (int $ord):self
			{
				$last=self::count ()-1;
				$family=(new ReflectionClass (__CLASS__))->isEnum ()?'enum':'class';
				if ($ord<0 || $ord>$last) throw new ValueError ("Order value '$ord' is out of range order values (0-$last) for $family ".__CLASS__);
				return self::cases ()[$ord];
			}
		
		public static function tryFromOrd (int $ord):?static
			{
				return self::cases ()[$ord]??null;
			}
		
		public function mapCase (bool $valueAsKey=false):array
			{
				return [$valueAsKey?$this->title ():$this->name=>$this->title ()];
			}
		
		public function title ():string
			{
				try
					{
						return $this->value?:$this->name;
					}catch (Throwable $e)
					{
						return $this->name;
					}
			}
		
		public function ord ():int
			{
				return array_search ($this,self::cases (),true);
			}
	}
