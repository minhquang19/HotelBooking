
<header class="header-desktop">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="header-wrap">
    <form class="form-header" action="" method="POST">
        {{--<input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
        <button class="au-btn--submit" type="submit">
            <i class="zmdi zmdi-search"></i>
        </button>--}}
    </form>
    <div class="header-button">
        <div class="noti-wrap">
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-comment-more"></i>
                <div class="mess-dropdown js-dropdown">
                    <div class="mess__title">
                    </div>
                </div>
            </div>
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-email"></i>
                <div class="email-dropdown js-dropdown">
                </div>
            </div>
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-notifications"></i>
                <div class="notifi-dropdown js-dropdown">
                </div>
            </div>
        </div>
        <div class="account-wrap">
            <div class="account-item clearfix js-item-menu">
                <div class="image">
                    <img src="" alt="" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{Auth::guard('admin')->user()->name}}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="{{ asset('backEnd/images/icon/avatar-01.jpg') }}" alt="Minh Quang" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{Auth::guard('admin')->user()->name}}</a>
                            </h5>
                            <span class="email">{{Auth::guard('admin')->user()->email}}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="post" class="d-none">
                             @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</header>
