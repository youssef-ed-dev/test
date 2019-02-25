<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </div>
        </nav>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-3">
                   <ul class="list-group">
                       <li class="list-group-item active">Menu</li>
                       <li class="list-group-item"><i class="fas fa-th-list"></i>
                          <a href="{{ route('article.index') }}" style="color:black;">Liste des articles</a>
                      </li>
                       <li class="list-group-item"><i class="fas fa-plus-circle"></i>
                          <a href="{{ route('article.create') }}" style="color:black;">Ajouter article</a>
                       </li>
                   </ul>
                </div>
                <div class="col-md-9">@yield('contenu')</div>
            </div>
        </div>

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    @if(session('success'))
    <script>
      toastr.success('{{ session('success') }}')
    </script>
    @endif

    @if(session('info'))
    <script>
      toastr.info('{{ session('info') }}')
    </script>
    @endif

    @if(session('warning'))
    <script>
      toastr.warning('{{ session('warning') }}')
    </script>
    @endif
</body>
</html>
