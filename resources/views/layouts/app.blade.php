<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    @yield('css')
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Portfolio') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            
            @guest
                <li class="nav-item{{ currentRoute(route('login')) }}"><a class="nav-link" href="{{ route('login') }}">@lang('Connexion')</a></li>
                <li class="nav-item{{ currentRoute(route('register')) }}"><a class="nav-link" href="{{ route('register') }}">@lang('Inscription')</a></li>
            @else
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<section class="container-fluid row">
    <aside class="col-sm-2">
    <!-- Sidebar Menu -->
    <ul class="nav flex-column">
        <li class="header">@lang('Administration')</li>
        @admin
       {{--  <li class="nav-item{{ currentRoute(route('image.create')) }}"><a class="nav-link" href="{{ route('image.create') }}">@lang('Ajouter une image')</a></li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle{{ currentRoute(
                    route('page.create'),
                    route('page.index'),
                    route('page.edit', request()->page ? : 0)
                )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('Pages')
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                <a class="dropdown-item" href="{{ route('page.create') }}">
                    <i class="fas fa-plus fa-lg"></i> @lang('Ajouter une page')
                </a>
                <a class="dropdown-item" href="{{ route('page.index') }}">
                    <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les pages')
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle{{ currentRoute(
                    route('article.create'),
                    route('article.index'),
                    route('article.edit', request()->article ? : 0)
                )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('Articles')
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                <a class="dropdown-item" href="{{ route('article.create') }}">
                    <i class="fas fa-plus fa-lg"></i> @lang('Ajouter un article')
                </a>
                <a class="dropdown-item" href="{{ route('article.index') }}">
                    <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les articles')
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle{{ currentRoute(
                    route('image.create'),
                    route('image.index'),
                    route('image.edit', request()->image ? : 0)
                )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('Images')
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                <a class="dropdown-item" href="{{ route('image.create') }}">
                    <i class="fas fa-plus fa-lg"></i> @lang('Ajouter une image')
                </a>
                <a class="dropdown-item" href="{{ route('image.index') }}">
                    <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les images')
                </a>
            </div>
        </li>
        @endadmin
    {{--</ul>    
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Administration</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="#"><i class="fa fa-fw fa-file-text"></i> <span>Articles</span></a></li>
          <li><a href="#"><i class="fa fa-fw fa-comment"></i> <span>Commentaires</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-fw fa-user"></i> <span>Utilisateurs</span>
              <span class="pull-right-container"> --}}
                  {{-- <i class="fa fa-angle-left pull-right"></i> --}}
         {{--        </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Liste</a></li>
              <li><a href="#">Créer</a></li>
            </ul>
          </li>
        </ul> --}}
    
    <!-- /.sidebar-menu -->
    </aside>
    <section class="main-admin-layout col-sm-9 row align-items-center justify-content-center">
        @if (session('ok'))
            <div class="container">
                <div class="alert alert-dismissible alert-success fade show" role="alert">
                    {{ session('ok') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @yield('content')
    </section>
</section>
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
<script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })
     $(function() {
        $('input[type="file"]').on('change',function(){
          let fileName = $(this).val().replace(/^.*[\\\/]/, '')
          $(this).next('.form-control-file').html(fileName)
        })
    })
</script>
</body>
</html>