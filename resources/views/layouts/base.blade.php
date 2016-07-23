<!DOCTYPE html>
<html lang="en">
 @include('partials._head')
<body>

		<div class="info-bar">
            @unless(Auth::check())
                <a href="/signin" class="inline-block px2 bg-darken-4 right white h4">Signin</a>
            <a href="/register" class="inline-block px2 bg-darken-4 right white h4 mr1">Signup</a>
            @endunless

            @if(Auth::check())
			<a href="/signout" class="inline-block px2 bg-red right white h4">Signout</a>
			@foreach((Auth::user()->load('roles')->roles) as $role)
				<a class="inline-block px2 bg-darken-4 left white h4">{{$role->name}}</a>
			@endforeach
			<a href="#0" class="inline-block px2 bg-darken-4 right white h4">{{Auth::user()->full_name}}</a>
            @endif
		</div>


	<main class="main-container">
		<header class="main-header">

			<!-- <div class="logo">
				<img src="http://placehold.it/100x100">
			</div> -->
            @include('partials._main-nav')

		</header>
		<section class="main-content-wrapper">
			<header class="content-header">
				<h1 class="page-title m0">@yield('page-title')</h1>
				@yield('content-header')
			</header>
			<section class="content-wrapper">
				<aside class="main-sidebar">
					<h1>Sidebar</h1>
					@yield('sidebar')
				</aside>
				<article class="main-content">
				 @yield('content')
				</article>
			</section>


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
	@stack('scripts')
</body>
</html>
