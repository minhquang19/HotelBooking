<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="/admin/">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="@yield('room')">
                                    <a href="{{ route('admin.room.index') }}">Room</a>
                                </li>
                                <li class="@yield('category')">
                                    <a href="{{ route('admin.category.index') }}">Category</a>
                                </li>
                                <li class="@yield('booking')">
                                    <a href="/admin/booking">Booking</a>
                                </li>
                                <li class="@yield('blog')">
                                    <a href="/admin/blog">Blog</a>
                                </li>
                                <li class="@yield('tag')">
                                    <a href="{{ route('admin.tag.index') }}">Tag</a>
                                </li>
                                <li class="@yield('service')">
                                    <a href="{{ route('admin.service.index') }}">Service</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
</header>
