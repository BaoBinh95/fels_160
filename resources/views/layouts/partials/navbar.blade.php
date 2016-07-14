<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">{{ trans('navbar.toggle') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            {{ link_to_route('welcome', config('fels.title'), null, ['class' => 'navbar-brand']) }}
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>{{ link_to_route('home', trans('navbar.home')) }}</li>
                <li>{{ link_to_route('users.index', trans('navbar.users')) }}</li>
                <!--User Learning -->
                @if (auth()->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('navbar.learning')}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <!-- Category -->
                            <li>
                                <a class="default" href="{{ route('user.categories') }}" role="button">{{ trans('category.categoy') }} </a>
                            </li>
                            <!-- Word -->
                            <li>
                                <a class="default" href="{{ route('user.words') }}" role="button">{{ trans('word.word') }}</a>
                            </li>
                            <!-- Lesson -->
                            <li>
                                <a class="default" href="#" role="button">{{ trans('lesson.lesson') }} </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                @if (auth()->check() && Auth::user()->is_admin)
                    <!-- Category Management -->
                    <li>
                        <a class="default" href="{{ route('admin.category.index') }}" role="button">{{ trans('category.categoy') }} </a>
                    </li>

                    <!-- Word Management -->
                    <li class="dropdown">
                        <a class="default" href="{{ route('admin.word.index') }}" role="button">{{ trans('word.word') }} </a>
                    </li>
                @endif

                <!-- Authentication Links -->
                @if (auth()->guest())
                    <li>{{ link_to('/login', trans('navbar.login')) }}</li>
                    <li>{{ link_to('/register', trans('navbar.register')) }}</li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('navbar.name', ['name' => auth()->user()->name]) }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {!! HTML::decode(link_to_route('users.show', '<i class="fa fa-btn fa-user"></i> ' . trans('navbar.profile'), auth()->id())) !!}
                            </li>
                            <li>
                                {!! HTML::decode(link_to_route('logout', '<i class="fa fa-btn fa-sign-out"></i> ' . trans('navbar.logout'))) !!}
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
