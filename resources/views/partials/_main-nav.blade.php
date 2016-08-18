<nav class="main-nav">

    <h1><a href="/">Home</a></h1>
    <h1><a href="/truck/book">Book A Truck</a></h1>
    @unless (Auth::check())
       {{-- <h1><a href="/signin">Signin</a></h1>
       <h1><a href="/register">register</a></h1> --}}
    @endunless
    @if(Auth::check())
        <h1><a href="/trucks">Trucks</a></h1>
        @unless (Auth::user()->isClient())
            <h1><a href="/truck/maps">Maps</a></h1>
        @endunless
        @if (Auth::user()->isDriver())
            <h1><a href="/truck/register">Register Truck</a></h1>
        @endif
        @if(Auth::user()->isAdmin())
            <h1><a href="/register">Register</a></h1>
            <h1><a href="/drivers">Drivers</a></h1>
            <h1><a href="/truck/input">Maps Input</a></h1>
        @endif
    @endif

</nav>
