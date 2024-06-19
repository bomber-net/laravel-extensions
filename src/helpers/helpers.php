<?php

use BomberNet\LaravelExtensions\Support\Arr;
use Illuminate\Support\Facades\Route;
use Psr\Log\LoggerInterface;
use Illuminate\Support\Facades\Log;

if (!function_exists ('str_normalize'))
	{
		function str_normalize (string $str):float|bool|int|string|null
			{
				return match (strtolower ($str))
					{
						'null'=>null,
						'true'=>true,
						'false'=>false,
						default=>is_numeric ($str)?(is_intnum ($str)?(int)$str:(float)$str):$str,
					};
			}
	}

if (!function_exists ('is_intnum'))
	{
		function is_intnum (mixed $value):bool
			{
				$type=get_debug_type ($value);
				if ($type==='int') return true;
				$int=(int)$value;
				settype ($int,$type);
				return $int===$value;
			}
	}

if (!function_exists ('sign'))
	{
		function sign (int|float|null $number):?int
			{
				return match (true)
					{
						$number<0=>-1,
						$number>0=>1,
						$number===null=>null,
						default=>0
					};
			}
	}

if (!function_exists ('hexbin'))
	{
		function hexbin (string $hex):?string
			{
				static $convert=
					[
						'0'=>'0000','1'=>'0001','2'=>'0010','3'=>'0011',
						'4'=>'0100','5'=>'0101','6'=>'0110','7'=>'0111',
						'8'=>'1000','9'=>'1001','a'=>'1010','b'=>'1011',
						'c'=>'1100','d'=>'1101','e'=>'1110','f'=>'1111',
					];
				$hex=strtolower ($hex);
				$bin='';
				foreach (str_split ($hex) as $char)
					{
						if (!($char=$convert[$char]??null)) return null;
						$bin.=$char;
					}
				return $bin;
			}
	}

if (!function_exists ('random_code'))
	{
		function random_code (string $chars,int $minLength,?int $maxLength=null):string
			{
				$minLength=max ($minLength,1);
				$maxLength=$maxLength?:$minLength;
				[$minLength,$maxLength]=[min ($minLength,$maxLength),max ($minLength,$maxLength)];
				$length=random_int ($minLength,$maxLength);
				$code='';
				while ($length--) $code.=$chars[random_int (0,strlen ($chars)-1)];
				return $code;
			}
	}

if (!function_exists ('php_shortversion'))
	{
		function php_shortversion ():string
			{
				return PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;
			}
	}

if (!function_exists ('php_version'))
	{
		function php_version ():string
			{
				return php_shortversion ();
			}
	}

if (!function_exists ('custom_log'))
	{
		function custom_log (string $name):LoggerInterface
			{
				return Log::build (
					[
						'driver'=>'single',
						'path'=>logs_path ($name),
					]);
			}
	}

if (!function_exists ('method2logname'))
	{
		function method2logname (bool $withTime=true):string
			{
				$back=debug_backtrace (DEBUG_BACKTRACE_IGNORE_ARGS)[1];
				$class=Arr::get ($back,'class');
				$class=$class?class_basename ($class).'::':'';
				return $class.$back['function'].($withTime?now ()->format (' Y-m-d H-i-s-u'):'');
			}
	}

if (!function_exists ('print_re'))
	{
		function print_re (mixed $var):string
			{
				return print_r ($var,true);
			}
	}

if (!function_exists ('routes_from_this'))
	{
		function routes_from_this (string|array $routes):void
			{
				$dir=substr (debug_backtrace (DEBUG_BACKTRACE_IGNORE_ARGS)[0]['file'],0,-4);
				foreach (Arr::wrap ($routes) as $route) Route::prefix ($route)->name ("$route.")->group ("$dir/$route.php");
			}
	}

if (!function_exists ('between'))
	{
		function between (int|float|string|null $value,int|float|string|null $min,int|float|string|null $max,bool $strict=false):bool
			{
				return $strict?($min<$value && $value<$max):($min<=$value && $value<=$max);
			}
	}

if (!function_exists ('used_middleware'))
	{
		function used_middleware (string|array $middleware):bool
			{
				$routeMiddleware=request ()?->route ()?->middleware ()??[];
				foreach (Arr::wrap ($middleware) as $mw)
					{
						if (in_array ($mw,$routeMiddleware,true)) return true;
					}
				return false;
			}
	}

if (!function_exists ('xml2array'))
	{
		function xml2array (string|DOMNode $xml):array
			{
				if (is_string ($xml))
					{
						$xmlDoc=new DOMDocument ();
						$xmlDoc->loadXML ($xml);
						$xml=$xmlDoc;
					}
				$node=[];
				/** @var DOMAttr $attribute */
				if ($xml->hasAttributes ()) foreach ($xml->attributes as $attribute) $node[$attribute->name]=$attribute->value;
				/** @var DOMNode $childNode */
				if ($xml->hasChildNodes ()) foreach ($xml->childNodes as $childNode)
					{
						$name=$childNode->nodeName;
						$value=($childNode instanceof DOMText)?$childNode->nodeValue:xml2array ($childNode);
						if (is_array ($value) && array_keys ($value)===['#text']) $value=$value['#text'];
						if (is_numeric ($value)) $value*=1;
						if (array_key_exists ($name,$node))
							{
								$node[$name]=Arr::wrap ($node[$name]);
								if (!array_is_list ($node[$name])) $node[$name]=[$node[$name]];
								$node[$name][]=$value;
							} else $node[$name]=$value;
					}
				return $node;
			}
	}
if (!function_exists ('socket_file'))
	{
		function socket_file (string $name):string
			{
				return run_path ("$name.sock");
			}
	}
