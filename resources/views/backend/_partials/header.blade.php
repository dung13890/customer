<nav class="navbar navbar-default app-header">
    <button class="navbar-toggler" type="buttom">&#9776;</button>
    <div class="navbar-brand">
        <a class="brand" href="#"></a>
    </div>

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $me->login_name }} <span class="caret"></span></a>
    <a target="_blank" href="{{ count($countComment) ? route('backend.home.read.comment', $countComment->first()->id) : 'javascript:void(0)' }}" class="icon-menu">
        <i class="ion-ios-bell-outline"></i>
        <span class="badge badge-dange">{{ count($countComment) }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li><a href="#"> <i class="ion-person"></i> {{ __('repositories.title.profile') }}</a></li>
        <li><a href="#"> <i class="ion-ios-cog"></i> {{ __('repositories.title.setting') }}</a></li>
        <li role="separator" class="divider"></li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="ion-android-exit"></i>
            {{ __('repositories.title.logout') }}
            </a>
            {{ Form::open(['url' => route('logout'), 'style' => 'display:none', 'id' => 'logout-form']) }}
            {{ Form::close() }}
        </li>
    </ul>
</nav>
