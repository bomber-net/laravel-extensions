<?php

if (!function_exists ('routes_path'))
	{
		function routes_path (string $path=''):string
			{
				return base_path ("routes/$path");
			}
	}

if (!function_exists ('logs_path'))
	{
		function logs_path (string $path=''):string
			{
				return storage_path ("logs/$path");
			}
	}

if (!function_exists ('run_path'))
	{
		function run_path (string $path=''):string
			{
				return storage_path ("run/$path");
			}
	}

if (!function_exists ('app_storage_path'))
	{
		function app_storage_path (string $path=''):string
			{
				return storage_path ("app/$path");
			}
	}

if (!function_exists ('framework_path'))
	{
		function framework_path (string $path=''):string
			{
				return storage_path ("framework/$path");
			}
	}

if (!function_exists ('cache_path'))
	{
		function cache_path (string $path=''):string
			{
				return framework_path ("cache/$path");
			}
	}

if (!function_exists ('views_path'))
	{
		function views_path (string $path=''):string
			{
				return resource_path ("views/$path");
			}
	}
