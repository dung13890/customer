<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href=""><i class="ion-home"></i> {{ __('repositories.home.name') }}</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-folder-outline"></i> Sản phẩm</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'product') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-clipboard"></i> {{ __('repositories.title.post') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.post.index') }}"> {{ __('repositories.title.list') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'post') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-paper-outline"></i> {{ __('repositories.title.page') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.page.index') }}"> {{ __('repositories.title.list') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'page') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-gear-outline"></i> {{ __('repositories.title.config') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.user.index') }}"> {{ __('repositories.user.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.config.index') }}"> {{ __('repositories.title.setting') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
