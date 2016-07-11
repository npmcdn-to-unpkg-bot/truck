<!DOCTYPE html>
<html lang="en">
 @include('partials.head')
<body>
	<main class="main-container">
		<header class="main-header">
			@if(Auth::check())
				<div class="info-bar">
					<a href="/signout" class="inline-block px2 bg-red right white h4">Signout</a>
					@foreach((Auth::user()->load('roles')->roles) as $role)
						<a class="inline-block px2 bg-darken-4 left white h4">{{$role->name}}</a>
					@endforeach
					<a href="#0" class="inline-block px2 bg-darken-4 right white h4">{{Auth::user()->full_name}}</a>
				</div>
			@endif
			<!-- <div class="logo">
				<img src="http://placehold.it/100x100">
			</div> -->
			<nav class="main-nav">
				<h1><a href="/">Home</a></h1>
				<h1><a href="/truck/book">Book A Truck</a></h1>
				@unless (Auth::check())
					<h1><a href="/driver/register">Register</a></h1>
					<h1><a href="/signin">Signin</a></h1>
				@endunless
				@if(Auth::check())
					@if(Auth::user()->isAdmin())
						<h1><a href="/admin/maps">Maps</a></h1>
						<h1><a href="/admin/trucks">Trucks</a></h1>
						<h1><a href="/admin/drivers">Drivers</a></h1>
						<h1><a href="/admin/register/user">Register User</a></h1>
						<h1><a href="/admin/truck/input">Maps Input</a></h1>
					@else
						<h1><a href="/driver/trucks">Trucks</a></h1>
						<h1><a href="/truck/register">Register Truck</a></h1>
						<h1><a href="/driver/maps">Maps</a></h1>
					@endif
				@else

				@endif
			</nav>

		</header>
		<section class="main-content-wrapper">
			<aside class="main-sidebar">
				<h1>Sidebar</h1>
				@yield('sidebar')
			</aside>
			<article class="main-content">
			 @yield('content')
			</article>

		</section>
		<footer class="main-footer">
			<ul class="list-reset">
				@unless (Auth::check())
					<li><a href="/signin" class="btn btn-primary not-rounded bg-lighten-3">Sign In</a></li>
				@endunless
			</ul>
			@yield('footer')
		</footer>
	</main>
</body>
</html>