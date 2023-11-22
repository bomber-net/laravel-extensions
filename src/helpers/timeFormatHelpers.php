<?php
if (!function_exists ('hms'))
	{
		function hms (float|int $time):string
			{
				$time=round ($time);
				$h=(int)($time/3600);
				$m=(int)($time/60)%60;
				$s=$time%60;
				return sprintf ('%02d:%02d:%02d',$h,$m,$s);
			}
	}

if (!function_exists ('hm'))
	{
		function hm (float|int $time):string
			{
				$time=round ($time/60);
				$h=(int)($time/60);
				$m=$time%60;
				return sprintf ('%02d:%02d',$h,$m);
			}
	}

if (!function_exists ('minsec'))
	{
		function minsec (float|int $time):string
			{
				$time=round ($time);
				$m=(int)($time/60);
				$s=$time%60;
				return sprintf ('%02d:%02d',$m,$s);
			}
	}
