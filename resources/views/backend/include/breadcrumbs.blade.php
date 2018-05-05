@if ($breadcrumbs)
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <i class="fa fa-dashboard"></i>
            @if ($breadcrumb->url && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    {{--<i class="fa fa-angle-right"></i>--}}
                    {{--<i class="fa fa-chevron-right"></i>--}}
                    <i class="fa fa-caret-right"></i>
                </li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endif