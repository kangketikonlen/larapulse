<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="{{ session()->get('role_url') }}">
            <img src="{{ $institution->logo }}" alt="logo" class="img-responsive shadow sw-9" />
        </a>
    </div>
    <!-- Logo End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="profile" alt="profile" src="{{ session('picture') }}" />
            <div class="name">{{ session('name') }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-1 ms-0 me-0">
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/profile">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/dashboard/logout">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="{{ session('role_url') }}">
                    <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
            </li>
            @foreach ($navbars as $navbar)
                @if (in_array($navbar->id, explode(',', session('role_navbars'))))
                    @if ($navbar->type == 'single')
                        <li>
                            <a href="{{ $navbar->url }}">
                                <i data-acorn-icon="{{ $navbar->icon }}" class="icon" data-acorn-size="18"></i>
                                <span class="label">{{ $navbar->name }}</span>
                            </a>
                        </li>
                    @elseif ($navbar->type == 'dropdown')
                        <li>
                            <a href="#{{ $navbar->name }}" data-href="{{ $navbar->url }}">
                                <i data-acorn-icon="{{ $navbar->icon }}" class="icon" data-acorn-size="18"></i>
                                <span class="label">{{ $navbar->name }}</span>
                            </a>
                            <ul id="{{ $navbar->name }}">
                                @foreach ($navbar->subnavbars as $subnavbar)
                                    @if (in_array($subnavbar->id, explode(',', session('role_subnavbars'))))
                                        <li>
                                            <a href="{{ $subnavbar->url }}">
                                                <span class="label">{{ $subnavbar->name }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
