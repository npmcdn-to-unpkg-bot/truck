<nav class="main-nav">

    <h1><a href="/">Home</a></h1>
    <h1><a href="/truck/book">Book A Truck</a></h1>
    <h1><a href="/register">Register</a></h1>
    @unless (Auth::check())
       <h1><a href="/signin">Signin</a></h1>
    @endunless
    @if(Auth::check())
        <h1><a href="/maps">Maps</a></h1>
        <h1><a href="/trucks">Trucks</a></h1>
        @unless (Auth::user()->isAdmin())
            <h1><a href="/truck/register">Register Truck</a></h1>
        @endunless
        @if(Auth::user()->isAdmin())

            <h1><a href="/drivers">Drivers</a></h1>
            <h1><a href="/truck/input">Maps Input</a></h1>
        @endif
    @endif
    {{-- @unless (Auth::check())
        <h1><a href="/register">Register</a></h1>
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

    @endif --}}
</nav>
