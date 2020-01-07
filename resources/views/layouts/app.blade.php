<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" >
            <nav class="navbar has-shadow is-mobile is-black">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start">
                            <a href="#" class="navbar-item">
                                <span class="icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span>
                                    Home
                                </span>
                            </a>
                            <a href="{{route('home')}}" class="navbar-item">
                                <span class="icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <span>
                                    User
                                </span>
                            </a>
                        </div>


                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">
                                        <span class="icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span>
                                            {{ Auth::user()->name }}
                                        </span>
                                    </a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <span class="icon">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </span>
                                            <span>
                                                Logout
                                            </span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            <section class="section ">
                <div class="container">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/modal.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('e906b21cfff6eba286c0', {
              cluster: 'ap1',
              forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                document.getElementById("feed").innerHTML = data.feed+" %";
                document.getElementById("water").innerHTML = data.water+" %";
            });
          </script>
          <script>
            document.addEventListener('DOMContentLoaded', () => {
                (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                  $notification = $delete.parentNode;

                  $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                  });
                });
              });
          </script>

    </body>
    <footer>
        <footer class="footer is-mobile">
            <div class="content has-text-centered">
              <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
              </p>
            </div>
          </footer>
    </footer>
</html>
