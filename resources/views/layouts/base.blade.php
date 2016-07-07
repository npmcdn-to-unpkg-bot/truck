<!DOCTYPE html>
<html lang="en">
 @include('partials.head')
<body>
	<main class="main-container">
		<header class="main-header">
			<nav class="main-nav">
				<h1><a href="/">Home</a></h1>
				<h1><a href="/truck/book">Book A Truck</a></h1>
				<h1><a href="/truck/register">Register A Truck</a></h1>
				<h1><a href="/truck/password/suspend">Add password/suspend</a></h1>
				<h1><a href="/truck/maps">Maps</a></h1>
				<h1><a href="/truck/maps/input">Maps Input</a></h1>
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
			@yield('footer')
		</footer>
	</main>
</body>
</html>