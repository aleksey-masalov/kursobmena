<header class="main-header">
    <a href="{{ url(homeRoute()) }}" class="logo">
        <span class="logo-mini"><b>{{ substr(config('app.name'), 0, 1) }}</b></span>
        <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('backend/img/avatar.png') }}" class="user-image" alt="{{ userName() }}">
                        <span class="hidden-xs">{{ userName() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('backend/img/avatar.png') }}" class="img-circle" alt="{{ userName() }}">

                            <p>
                                {{ userName() }}

                                @if(auth()->check())
                                    @if(!empty(auth()->user()->roles))
                                        - {{ auth()->user()->roles->first()->name }}
                                    @endif

                                    <small>
                                        {{ trans('strings.backend.user.member_since') }}
                                        {{ auth()->user()->created_at->format('d M Y') }}
                                    </small>
                                @endif
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url(homeRoute()) }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-home"></i>
                                    {{ trans('buttons.general.home') }}
                                </a>
                            </div>

                            @if(auth()->check())
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-danger btn-flat">
                                        <i class="fa fa-sign-out"></i>
                                        {{ trans('buttons.general.logout') }}
                                    </a>
                                </div>
                            @endif
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>