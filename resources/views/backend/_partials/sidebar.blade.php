<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.home.index') }}"><i class="ion-home"></i> {{ __('repositories.home.name') }}</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-folder-outline"></i> {{ __('repositories.title.product') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.product.index') }}"> {{ __('repositories.product.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'product') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-clipboard"></i> {{ __('repositories.title.post') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.post.type', 'post') }}"> {{ __('repositories.post.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'post') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-book"></i> {{ __('repositories.title.article') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.post.type', 'article') }}"> {{ __('repositories.post.article') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.category.type', 'article') }}"> {{ __('repositories.category.name') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="ion-ios-paper-outline"></i> {{ __('repositories.title.page') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.page.type', 'introduce') }}"> {{ __('repositories.page.introduce') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.page.type', 'distributor') }}"> {{ __('repositories.page.distributor') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.page.type', 'investor') }}"> {{ __('repositories.page.investor') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.page.type', 'recruitment') }}"> {{ __('repositories.page.recruitment') }}</a>
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
                        <a class="nav-link" href="{{ route('backend.role.index') }}"> {{ __('repositories.role.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.slide.index') }}"> {{ __('repositories.slide.name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.menu.index') }}"> {{ __('repositories.title.menu') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.config.index') }}"> {{ __('repositories.title.setting') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
