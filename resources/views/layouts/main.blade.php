<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

</head>
<body>

<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text">Blog M</li>
<li><a href="/home">Home</a></li>
<li><a href="/articles">Articles</a></li>
<li><a href="/contact">Contact</a></li>
<li><a href="/admin/articles">Admin</a></li>
<li><a href="/admin/users">Users</a></li>
</ul>
</div>
<divs style="float: right">
@guest
                            
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Creation compte') }}</a>
                                </div>
                            @endif
                        @else
                            <div class="nav-item dropdown" style="float: right">
                                <a>
                                  <span class="caret"> Bonjour</span>  {{ Auth::user()->name}} 
                                </a>

                                <div>
                                	
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
 </div>                       



</div>

<div class="callout large primary">
<div class="row column text-center">

<h1>Malo Blog</h1>
<h2 class="subheader">Such a Simple Blog </h2>
</div>
</div>

<div class="row medium-8 large-7 columns">

 @yield('content')


</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
