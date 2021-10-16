<aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('FrontEnd/img/logo.png') }} " alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="@yield('index')">
                                <a class="" href="/admin/home">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="has-sub @yield('manager')">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Manager</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="@yield('block')">
                                        <li class="@yield('room')">
                                            <a href="{{ route('admin.room.index') }}"><i class="fas fa-building"></i>Room</a>
                                        </li>
                                        <li class="@yield('category')">
                                            <a href="{{ route('admin.category.index') }}"><i class="fas fa-clipboard-list"></i>Category</a>
                                        </li>
                                        <li class="@yield('booking')">
                                            <a href="/admin/booking"><i class="fas fa-table"></i>Booking</a>
                                        </li>
                                        <li class="@yield('blog')">
                                            <a href="/admin/blog"><i class="fas fa-newspaper"></i>Blog</a>
                                        </li>
                                        <li class="@yield('tag')">
                                            <a href="{{ route('admin.tag.index') }}"><i class="fas fa-tag"></i>Tag</a>
                                        </li>
                                        <li class="@yield('service')">
                                            <a href="{{ route('admin.service.index') }}"><i class="fas fa-utensils"></i>Service</a>
                                        </li>
                                    </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
    </aside>
