<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/img/avatar.png') }}" class="img-circle" alt="{{ userName() }}">
            </div>

            <div class="pull-left info">
                <p>{{ userName() }}</p>
                <small><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.user.status.online') }}</small>
            </div>
        </div>

        {{--<ul class="sidebar-menu" data-widget="tree">--}}
            {{--<li class="header">Title</li>--}}
            {{--<li class="active">--}}
                {{--<a href="#"><i class="fa fa-link"></i> <span>Link</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-link"></i> <span>Multilevel</span>--}}
                    {{--<span class="pull-right-container">--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                    {{--<li><a href="#">Link in level 2</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </section>
</aside>