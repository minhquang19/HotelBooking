<header>
      <div class="header-top-area section-bg">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xl-4 col-lg-7 offset-xl-3 col-md-6">
                  <ul class="top-contact-info list-inline">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>{{__('hoteladdress')}}</li>
                     <li><i class=" fa fa-phone" aria-hidden="true"></i>{{__('tel')}}</li>
                  </ul>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-6">
                  <div class="top-right text-right">
                     <ul class="top-menu list-inline d-inline">
                        <li><a href="/">{{__('home')}}</a></li>
                        <li><a href="/service">{{__('service')}}</a></li>
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
                  <div class="logo"><a href="/"><img src="/frontEnd/img/logo.png" alt="Avson"></a></div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-8 col-5">
                  <div class="menu-right-area text-right">
                     <div class="lag-select">
                        <div class="lag-img"><img src="/frontEnd/img/icons/flag.png" alt="Flug" class="image-swap"></div>
                        <div class="lag-option" style="height: 100%">
                            <select class="langselect" name="inp_exercise_id" id="inp_exercise_id" style="padding: 0;height: 100%">
                                @if(App()->getLocale()=='en')
                                    <option data-divid="/frontEnd/img/icons/flag.png" data-link="{{route('lang',['en'])}}" value="1" selected>EngLish</option>
                                    <option data-divid="/frontEnd/img/icons/vi.png" data-link="{{route('lang',['vi'])}}" value="2"> Tiếng Việt</option>
                                @else
                                <option data-divid="/frontEnd/img/icons/flag.png" data-link="{{route('lang',['en'])}}" value="1">EngLish</option>
                                <option data-divid="/frontEnd/img/icons/vi.png" data-link="{{route('lang',['vi'])}}" value="2" selected> Tiếng Việt</option>
                                @endif
                            </select>
                        </div>
                     </div>
                     <nav class="main-menu" style="display: block;">
                        <ul class="list-inline">
                           <li class="@yield('active_home')">
                              <a href="/">{{__('home')}}</a>
                           </li>
                           <li class="@yield('active_room')">
                              <a href="/room">{{__('room')}}</a>
                           </li>
                           <li class="@yield('active_service')">
                               <a href="/service">{{__('service')}}</a>
                           </li>
                           <li class="@yield('active_blog')">
                              <a href="/blog">{{__('new')}}</a>
                           </li>
                           <li class="@yield('active_contact')">
                               <a href="/contact">{{__('contact')}}</a>
                           </li>
                        </ul>
                     </nav>
                     <div class="search-wrap">
                        <a class="search-icon"><i class="fas fa-search" ></i></a><a class="search-icon icon-close"><i class="fas fa-times"></i>  </a>
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
                                       <form action="" class="logout" >
                                       <a href="/booking/#section-info" style="color: black;">{{__('profile')}}</a>
                                       ></form>
                                       <form  class="logout" method="POST" action="{{ route('logout') }}">
                                           @csrf
                                           <a style="color: black;" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                               this.closest('form').submit();">
                                               {{ __('logout') }}
                                           </a>
                                       </form>

                                 </div>
                              </div>
                          @else
                              <div class="quote-btn">
                              <a class="btn filled-btn" href="{{ route('login') }}" style="padding: 0 20px !important">{{__('login')}}
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
@section('scripts_lang')
    <script >
        $(document).ready(function(){
            $("#inp_exercise_id").change(function(){
                var opt = $('.langselect').find(":selected");
                var divid = opt.data('divid');
                $('.image-swap').removeAttr('src');
                $('.image-swap').attr("src",divid);
                location = opt.data('link');
            });

        });
        var locale = '{{ config('app.locale') }}';
       console.log(locale)
        if(locale =='en')
        {
            $(".langselect").val(1);
            $('.image-swap').attr("src","/frontEnd/img/icons/flag.png");
        }else{
            $(".langselect").val(2);
            $('.image-swap').attr("src","/frontEnd/img/icons/vi.png");
        }
    </script>
@endsection
