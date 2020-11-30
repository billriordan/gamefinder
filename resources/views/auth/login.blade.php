<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travel Game Finder</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"   crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">


</head>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Travel Game Finder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        @include('partials.login')
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<body>
    <div class="container-fluid">

        <!-- Masthead -->
        <header class="jumbotron">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="col-lg-12 text-center">
                        <h1 class="masthead">Sign up and find other travel sports teams to play on days you are available!</h1>
                    </div>

                    <div class="col-lg-12 text-center">
                        @include('partials.register')
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </header>
    
        <!-- Icons Grid -->
        <section class="features-icons bg-light text-center">
          <div class="container">
            <div class="row">
    
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-screen-desktop m-auto text-primary"></i>
                    </div>
                    <h3>Set Available Days</h3>
                    <p class="lead mb-0">Set days you would want other teams to know you are available to play!</p>
                </div>
              </div>
    
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>Search For Teams</h3>
                    <p class="lead mb-0">Search for games on any given day to schedule a game!</p>
                </div>
              </div>
    
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">Let us help you find teams to play this season!</p>
                </div>
              </div>
    
            </div>
          </div>
        </section>
        <!-- Footer -->
    @include('partials.footer')
    </div>
  </body>
</html>