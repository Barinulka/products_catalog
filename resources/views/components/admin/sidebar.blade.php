<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('categories.index')) active @endif" href="{{ route('categories.index') }}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('goods.index')) active @endif" href="{{ route('goods.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Товары
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.index')) active @endif" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>
        </ul>
    </div>
</nav>