<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'mynote') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <style>
          .card-new-task {
              margin-bottom: 20px;
          }
      </style>

      <!-- jQuery と toastr.js の読み込み -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
      </script>

      <script>
          @if (session('flash_message'))
              $(function () {
              toastr.success('{{ session('flash_message') }}');
          });
          @endif
      </script>

  </head>

  @if (request()->path() == "notes/index")
      <body style="background:url(/storage/image/{{Auth::user()->wallpaper->image_path}}); background-size:cover">
  @else
      <body>
  @endif
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
              <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name', 'mynote') }}
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('login') }}">LOGIN</a>
                              </li>
                              <li class="nav-item">
                                  @if (Route::has('register'))
                                      <a class="nav-link text-right" href="{{ route('register') }}">SIGN UP</a>
                                  @endif
                              </li>
                          @else
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                      Log out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('notes.add') }}">
                                      Create Note
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('notes.list') }}">
                                      Notes list
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('notes.completelist') }}">
                                      Complete list
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-right" href="{{ route('users.edit') }}">
                                      Profile edit
                                  </a>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>
          <main class="py-4">
            @yield('content')
          </main>
      </div>

  </body>
</html>
