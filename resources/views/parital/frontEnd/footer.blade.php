<footer>
      <div class="container">
         <div class="footer-top">
            <div class="row">
               <div class="col-lg-3 col-md-6">
                  <div class="widget footer-widget">
                     <div class="footer-logo"><img src="/frontEnd/img/logo.png" alt="Logo"></div>
                     <p style="text-align: center">Another day in Paradise</p>
                     <ul class="social-icons">
                        <li><a href="https://www.facebook.com/webtend/"><i style="padding-top: 10px;" class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/webtend"><i style="padding-top: 10px;" class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/webtend"><i style="padding-top: 10px;" class="fab fa-instagram"></i></a></li>
                        <li><a href="https://google.com/webtend"><i style="padding-top: 10px;" class="fab fa-google"></i></a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-5 col-md-6">
                  <div class="widget footer-widget">
                     <ul class="nav-widget clearfix">
                        <li><a href="">{{__('namehotel')}}</a></li>
                        <li><a href="">{{__('hoteladdress')}}</a></li>
                         <li><a href="">{{__('tel')}}</a></li>
                        <li><a href="">{{__('hotelemail')}}</a></li>
                        <li><a href="">{{__('hotelfax')}}</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="widget footer-widget">
                     <h4 class="widget-title">Recent News</h4>
                     <ul class="recent-post avson-go-top">
                         @forelse($blog as $item)
                        <li>
                           <div class="recent-post-img"><img src="{{asset('upload/blog/'.$item->coverImage)}}" alt="News"></div>
                           @if(App()->getLocale() =='en')
                                <h6><a href="">{{$item->title}}</a></h6>
                           @else
                                <h6><a href="">{{$item->title_vi}}</a></h6>
                           @endif
                           <span class="recent-post-date">{{$item->created_at}}</span>
                        </li>
                         @empty
                             <li>
                                 <h6><a href="">No Blog Here</a></h6>
                             </li>
                         @endforelse
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <a href="#" class="back-to-top"><i class="icon fa fa-angle-up"></i></a>
            <div class="row">
               <div class="col-md-6 avson-go-top">
                  <ul class="footer-nav">
                     <li><a href="/">Home</a></li>
                     <li><a href="/about">About</a></li>
                     <li><a href="/service">Services</a></li>
                  </ul>
               </div>
               <div class="col-md-6">
                  <p class="copy-right text-right">{{__('copyright')}}</p>
               </div>
            </div>
         </div>
      </div>
</footer>
