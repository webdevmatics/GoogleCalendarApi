<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                NoteBook App
            </title>
            <link href="{{asset('dist/css/main.css')}}" rel="stylesheet">
                <link href="{{asset('/dist/css/bootstrap.css')}}" rel="stylesheet">
                </link>
            </link>
        </meta>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-dark bg-primary">
                <button aria-controls="navbar-header" class="navbar-toggler hidden-sm-up" data-target="#navbar-header" data-toggle="collapse" type="button">
                    ☰
                </button>
                <div class="collapse navbar-toggleable-xs pull-xs-left" id="navbar-header">
                    <a class="navbar-brand" href="#">
                        NoteBook App
                    </a>
                </div>
                
                <!-- Right Side Of Navbar -->
                <ul  class="navholder dropdown pull-xs-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li >
                                    <a style="color:black" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /navbar -->
            <!-- Main component for call to action -->
            @yield('content')
        </div>
        <!-- /container -->
        <script src="{{asset('dist/js/jquery3.min.js')}}">
        </script>
        <script src="{{asset('dist/js/bootstrap.js')}}">
        </script>
    </body>
</html>
