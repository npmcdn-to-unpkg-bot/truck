<head>
	<meta charset="UTF-8">
	<title>Truck - @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,500,700|Roboto:100,400" rel="stylesheet">
	<link href="https://npmcdn.com/basscss@7.1.1/css/basscss.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/main.css">
	@if (Auth::check())
		<link rel="stylesheet" href="/css/user.css">
	@endif
	@stack('styles')
</head>
