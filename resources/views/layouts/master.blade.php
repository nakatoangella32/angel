<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Favicon.png">

    @include('layouts.partials.css.css')

    <title>My Bank</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">My Bank</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (auth()->check())
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ number_format(auth()->user()->account->current_balance, 2) }} <small>
                                    {{ auth()->user()->account->currency->code }} </small></a>
                        </li>
                    </ul>
                @endif

            </div>

        </div>
    </nav>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">My Bank</div>
                        <div class="card-body">
                            @include('layouts.partials.flash')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

</html>
