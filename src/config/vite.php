<?php
$assetsDir=env ('ASSETS_DIRECTORY','assets');
return
	[
		'assetsDirectory'=>$assetsDir,
		'bundleDirectory'=>env ('VITE_BUNDLE_DIRECTORY','bundle'),
		'buildDirectory'=>"$assetsDir/".env ('VITE_BUNDLE_DIRECTORY','bundle'),
		'baseDirector'=>env ('VITE_BASE_DIRECTORY',''),
	];
