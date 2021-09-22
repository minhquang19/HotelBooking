<header>
      <div class="header-top-area section-bg">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xl-4 col-lg-7 offset-xl-3 col-md-6">
                  <ul class="top-contact-info list-inline">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>41A Phu Dien Street - Bac Tu Liem - Ha Noi  </li>
                     <li><i class=" fa fa-phone" aria-hidden="true"></i>(+84)0389769239</li>
                  </ul>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-6">
                  <div class="top-right text-right">
                     <ul class="top-menu list-inline d-inline">
                        <li><a href="/">Home</a></li>
                        <li><a href="/service">Services</a></li>
                     </ul>
                     <ul class="top-social-icon list-inline d-inline">
                        <li><a href="https://www.facebook.com/webtend/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/webtend"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/webtend"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://google.com/webtend"><i class="fab fa-google"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="header-menu-area">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xl-3 col-lg-3 col-md-4 col-7">
                  <div class="logo"><a href="/"><img src="/assets/img/logo.png" alt="Avson"></a></div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-8 col-5">
                  <div class="menu-right-area text-right">
                     <div class="lag-select">
                        <div class="lag-img"><img src="/assets/img/icons/flag.png" alt="Flug"></div>
                        <div class="lag-option">
                           <select style="display: none;">
                              <option value="English">English</option>
                              <option value="Vietnam">Việt Nam</option>
                           </select>
                           <div id="select1" class="nice-select" tabindex="0">
                              <span class="current">English</span>
                              <ul class="list">
                                 <li data-value="English" class="option selected">English</li>
                                 <li data-value="Vietnam" class="option">Việt Nam</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <nav class="main-menu" style="display: block;">
                        <ul class="list-inline">
                           <li class="@yield('active_home')">
                              <a href="/">Home</a>
                           </li>
                           <li class="@yield('active_room')">
                              <a href="/">Rooms</a>
                           </li>
                           <li class="@yield('active_service')">
                               <a href="/service">Services</a>
                           </li>
                           <li class="@yield('active_blog')">
                              <a href="/blog">News</a>
                           </li>
                           <li class="@yield('active_contact')">
                               <a href="/contact">Contact</a>
                           </li>
                        </ul>
                     </nav>
                     <div class="search-wrap">
                        <a class="search-icon"><i class="fas fa-search" style="padding-top: 37px;"></i></a><a class="search-icon icon-close"><i class="fas fa-times"></i>  </a>
                        <div class="search-form">
                           <form><input type="search" placeholder="TYPE AND PRESS ENTER....."></form>
                        </div>
                     </div>
                     @if (Route::has('login'))
                      <div class="login">
                          @auth
                           <div class="quote-btn logined">
                                 <div class="btn filled-btn have-submenu" style="padding: 0 20px !important">{{ Auth::user()->name }}
                                    <i class="fas fa-2x fa-sort-down"></i>
                                       <!-- Authentication -->
                                       <form action="" class="logout">
                                       <a href="/booking">Profile</a>
                                       ></form>
                                       <form  class="logout" method="POST" action="{{ route('logout') }}">
                                           @csrf
                                           <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                               this.closest('form').submit();">
                                               {{ __('Logout') }}
                                           </a>
                                       </form>

                                 </div>
                              </div>
                          @else
                              <div class="quote-btn">
                              <a class="btn filled-btn" href="{{ route('login') }}" style="padding: 0 20px !important">Login
                                 <i class="fas fa-long-arrow-alt-right"></i>
                              </a>
                              </div>
                          @endauth
                      </div>
                     @endif

                  </div>
               </div>
            </div>
            <div class="mobilemenu"></div>
         </div>
      </div>
   </header>
