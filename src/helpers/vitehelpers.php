<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/** @noinspection ClassConstantCanBeUsedInspection */
if (class_exists ('\Illuminate\Support\Facades\Vite'))
	{
		if (!function_exists ('vite_assets'))
			{
				function vite_assets (?string $buildDirectory=null):array
					{
						$buildDirectory??='bulid';
						$vite=Illuminate\Support\Facades\Vite::useBuildDirectory ($buildDirectory);
						$vite->toHtml ();
						return Arr::first ((new ReflectionClass ($vite))->getProperty ('manifests')->getValue ());
					}
			}
		
		if (!function_exists ('vite_entries'))
			{
				function vite_entries (?string $buildDirectory=null,bool $asList=true):array
					{
						$entries=array_filter (vite_assets ($buildDirectory),static fn (array $asset) => $asset['isEntry']??false);
						if ($asList) $entries=array_keys ($entries);
						return $entries;
					}
			}
		
		if (!function_exists ('vite_scripts'))
			{
				function vite_scripts (?string $buildDirectory=null,bool $asList=true):array
					{
						$scripts=array_filter (vite_entries ($buildDirectory,false),static function (array $entry)
							{
								return Str::endsWith (strtolower ($entry['src']),['.js','.ts']);
							});
						if ($asList) $scripts=array_keys ($scripts);
						return $scripts;
					}
			}
		
		if (!function_exists ('vite_styles'))
			{
				function vite_styles (?string $buildDirectory=null,bool $asList=true):array
					{
						$scripts=array_filter (vite_entries ($buildDirectory,false),static function (array $entry)
							{
								return Str::endsWith (strtolower ($entry['src']),['.css','.less','.scss','.sass']);
							});
						if ($asList) $scripts=array_keys ($scripts);
						return $scripts;
					}
			}
	}
