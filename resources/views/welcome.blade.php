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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="">
    <nav class="navbar navbar-light bg-success justify-content-between">
        <a class="navbar-brand" style="color: white">Hlab</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: white">Search</button>
        </form>
    </nav>
    <main class="py-4">
        <div class="row container-fluid">

            {{-- main content area--}}
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mb-3">
                        @if($post->image)
                            <img class="card-img-top" src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}" style="height: 400px">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                {{ $post->body }}
                            </p>
                            <p class="card-text"><small class="text-muted">{{ $post->writer->name }} </small></p>
                        </div>
                    </div>
                @endforeach
                    {{ $posts->links() }}
            </div>

            {{-- side navbar --}}
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Recent Posts
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($latest_posts as $post)
                        <li class="list-group-item">
                            <a href="">{{ $post->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
