{{-- @section('title', 'Home') --}}
    <!DOCTYPE html>
    <html lang="en">
      <head>
      <link rel="stylesheet" type="text/css" href="home.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <title>Truck - Home</title>
      </head>

      <body style=" background-color: #f2f2f2" >



    <div class="container-fluid">

      	<div class="panel-group collapse navbar-collapse" style="margin:0">
      	<div class="panel panel-default">
      	<div class="panel-body " style="background-color: #f2f2f2">
      	<div class="col-sm-4"></div>
            <div class="col-sm-1 text-uppercase"><b><a href="/">Home</a></b></div>
            {{-- <div class="col-sm-1 text-uppercase"><b><a href="/truck/book">Book A Truck</a></b></div> --}}

            @unless (Auth::check())
               <div class="col-sm-1 text-uppercase"><b><a href="/signin">Signin</a></b></div>
               <div class="col-sm-1 text-uppercase"><b><a href="/register">Register</a></b></div>
            @endunless
            @if(Auth::check())
                <div class="col-sm-1 text-uppercase"><b><a href="/truck/maps">Maps</a></b></div>
                <div class="col-sm-1 text-uppercase"><b><a href="/trucks">Trucks</a></b></div>
                @unless (Auth::user()->isAdmin())
                    <div class="col-sm-1 text-uppercase"><b><a href="/truck/register">Register Truck</a></b></div>
                @endunless
                @if(Auth::user()->isAdmin())
                    <div class="col-sm-1 text-uppercase"><b><a href="/register">Register</a></b></div>
                    <div class="col-sm-1 text-uppercase"><b><a href="/drivers">Drivers</a></b></div>
                    <div class="col-sm-1 text-uppercase"><b><a href="/truck/input">Maps Input</a></b></div>
                @endif
            @endif
          {{-- <div class="col-sm-1 text-uppercase"><a href="/"><b>Home</b></a></div>
          <div class="col-sm-1 text-uppercase"><a><b>Product</b></a></div>
          <div class="col-sm-1 text-uppercase"><a><b>Services</b></a></div>
          <div class="col-sm-1 text-uppercase"><a><b>Transport</b></a></div>
          <div class="col-sm-1 text-uppercase"><a><b>Tracking</b></a></div>
          <div class="col-sm-1 text-uppercase"><a href="/signin"><b>Login</b></a></div>
          <div class="col-sm-1 text-uppercase"><a><b>Contact</b></a></div> --}}
      </div>
      </div>
      </div>

    </div>





    <!--Navigation bar-->

    <nav class="navbar navbar-inverse" >
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-uppercase " href="#">Product</a>
        </div>
        <div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a>Micro</a> </li>
              <li><a href="#section2">Services</a></li>
              <li><a href="#section3">Sensors</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#section41">High grade</a></li>
                  <li><a href="#section42">Low grade</a></li>
                </ul>
              </li>
            </ul>



          </div>
        </div>
      </div>
    </nav>


    <!--courousel-->

    <div class="panel-group container-fluid" style=" margin:0">
    <div class="panel panel-default">
    <div class="panel-body" style=" background-color: #f2f2f2;" >
    <div class="container">
      <div id="myCarousel" class="carousel slide"" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" >
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images\t1.jpg" alt="truck" width="1200"  >
          </div>

          <div class="item">
            <img src="images\t2.jpg" alt="truck" width="1200" >
          </div>

          <div class="item">
            <img src="images\t3.jpg" alt="truck" width="1200" >
          </div>

          <div class="item">
            <img src="images\t4.jpg" alt="truck" width="1200" >
          </div>
        </div>
         <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div></div>
    </div>
    </div>



    <div class="panel-group container-fluid" style=" margin:0">
    <div class="panel panel-default">
    <div class="panel-body" style=" background-color: #f2f2f2;" >

    	<div class="container " >

      <div class="col-sm-4"><a href="#">><img src="images\images5.jpg" class="img-rounded" alt="Cinque Terre" width="328" height="300"></a></div>
      <div class="col-sm-4"><a href="#">><img src="images\images5.jpg" class="img-rounded" alt="Cinque Terre" width="328" height="300"></a></div>
      <div class="col-sm-4"><a href="#">><img src="images\images5.jpg" class="img-rounded" alt="Cinque Terre" width="328" height="300"></a></div>


    </div>
    </div>
    </div>
    </div>


    </div>


    <!--Footer-->

    <div class="panel-group container-fluid" style=" margin:0">
    <div class="panel panel-default">
    <div class="panel-body" style=" background-color: #808080;" >

    <div class="container">


    </div>
    </div>
    </div>



      </body>
    </html>
