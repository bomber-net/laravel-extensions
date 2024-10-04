<?php

namespace BomberNet\LaravelExtensions\Models;

use Closure;
use DateTimeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;
use BomberNet\LaravelExtensions\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Contracts\Database\Query\Expression as ExpressionContract;

/**
 * @method static static create (array $attributes=[])
 * @method static static createOrFirst (array $attributes=[],array $values=[])
 * @method static Builder withoutGlobalScope(Scope|string $scope)
 * @method static Builder withoutGlobalScopes(?array $scopes=null)
 * @method static static|null first (array|string $columns=['*'])
 * @method static static firstOrNew (array $attributes=[],array $values=[])
 * @method static static firstOrCreate (array $attributes=[],array $values=[])
 * @method static static updateOrCreate (array $attributes=[],array $values=[])
 * @method static Collection|static|null find (mixed $id,array|string $columns=['*'])
 * @method static Collection|static|mixed findOr (mixed $id,Closure|array|string $columns=['*'],Closure|null $callback=null)
 * @method static Collection|static findOrFail (mixed $id,array|string $columns=['*'])
 * @method static int upsert (array $values,array|string $uniqueBy,array|null $update=null)
 * @method static LazyCollection cursor ()
 * @method static Collection get (array $columns=['*'])
 * @method static Builder scopes (array|string $scopes)
 * @method static Builder select (array|mixed $columns=['*'])
 * @method static Builder setQuery (Builder $query)
 * @method static Builder where (Closure|string|array|Expression $column,mixed $operator=null,mixed $value=null,string $boolean='and')
 * @method static Builder orWhere (Closure|array|string|Expression $column,mixed $operator=null,mixed $value=null)
 * @method static Builder whereIn (string $column,mixed $values,string $boolean='and',bool $not=false)
 * @method static Builder whereBetween (string|Expression $column,iterable $values,string $boolean='and',bool $not=false)
 * @method static Builder whereNotBetween (string|Expression $column,iterable $values,string $boolean='and')
 * @method static Builder orWhereBetween (string|Expression $column,iterable $values)
 * @method static Builder orWhereNotBetween (string|Expression $column,iterable $values)
 * @method static Builder whereNotIn (string $column,mixed $values,string $boolean='and')
 * @method static Builder whereRaw (string $sql,mixed $bindings=[],string $boolean='and')
 * @method static Builder whereNull (string|array $columns,string $boolean='and',Bool $not=false)
 * @method static Builder whereNotNull (string|array $columns,string $boolean='and')
 * @method static Builder whereHas (string $relation,Closure|null $callback=null,string $operator='>=',int $count=1)
 * @method static Builder orWhereHas (string $relation,Closure|null $callback=null,string $operator='>=',int $count=1)
 * @method static Builder whereDoesntHave (string $relation,?Closure $callback=null)
 * @method static Builder orWhereDoesntHave (string $relation,Closure $callback=null)
 * @method static Builder whereDay (string $column,string $operator,DateTimeInterface|string|int|null $value=null,string $boolean='and')
 * @method static Builder join (ExpressionContract|string $table,Closure|ExpressionContract|string $first,string|null $operator=null,ExpressionContract|string|null $second=null,string $type='inner',bool $where=false)
 * @method int increment (string|Expression $column,float|int $amount=1,array $extra=[])
 * @method int decrement (string|Expression $column,float|int $amount=1,array $extra=[])
 * @method static Collection pluck (string|Expression $column,?string $key=null)
 * @method static int count (string $columns='*')
 * @method static bool exists ()
 */
abstract class Model extends EloquentModel
	{
		use HasFactory;
		
		public static function getDefaultFillable ():array
			{
				/** @var static $model */
				$model=app (static::class);
				return $model->getFillable ();
			}
		
		public function unsetAttributes (string|array|Collection $attributes):void
			{
				$attributes=$attributes instanceof Collection?$attributes->toArray ():Arr::wrap ($attributes);
				$this->attributes=Arr::except ($this->attributes,$attributes);
			}
	}
