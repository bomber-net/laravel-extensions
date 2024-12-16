@props (['description'=>'','keywords'=>'','author'=>''])
<meta charset="utf-8">
<meta name="csrf-token" content="{{csrf_token ()}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{$description}}">
<meta name="keywords" content="{{$keywords}}">
<meta name="author" content="{{$author}}">
{{$slot}}
