<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script defer src="{{asset('js/app.js')}}"></script>
    <title>Duck Tournaments</title>
</head>
<body>
    <x-header/>

    {{$slot}}

    <x-footer/>
    
</body>
</html>