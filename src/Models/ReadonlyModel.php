<?php

namespace BomberNet\LaravelExtensions\Models;

class ReadonlyModel extends Model
	{
		public $timestamps=false;
		public $incrementing=false;
		
		public function save (array $options=[]):false
			{
				return false;
			}
		
		public function update (array $attributes=[],array $options=[]):false
			{
				return false;
			}
		
		public function delete ():false
			{
				return false;
			}
		
		protected static function boot ():void
			{
				parent::boot ();
				static::saving (static fn () => false);
				static::updating (static fn () => false);
				static::deleting (static fn () => false);
			}
	}
