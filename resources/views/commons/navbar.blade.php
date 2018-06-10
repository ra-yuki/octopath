<header>
    <nav id="nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt""> OCTOPATH</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>{!! link_to_route('octopaths.create', 'MERGE') !!}</li>
                    <li>{!! link_to_route('users.dashboard', 'DASHBOARD') !!}</li>
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown">
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            <!-- options -->
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('users.config', 'SETTIGNS') !!}</li>
                                <li>{!! link_to_route('users.dashboard', 'DASHBOARD') !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{{ link_to_route('logout.get', 'LOGOUT') }}
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('signup.get', 'SIGNUP/LOGIN') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>