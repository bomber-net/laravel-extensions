<?php
$file=base_path ('vite.json');
return file_exists ($file)?(json_decode (file_get_contents (base_path ('vite.json')),true)??[]):[];
