
 <footer>
      <div class="container">
         <div class="footer-top">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="widget footer-widget">
                     <div class="footer-logo"><img src="/assets/img/logo.png" alt="Logo"></div>
                     <p>Another day in Paradise</p>
                     <ul class="social-icons">
                        <li><a href="https://www.facebook.com/webtend/"><i style="padding-top: 10px;" class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/webtend"><i style="padding-top: 10px;" class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/webtend"><i style="padding-top: 10px;" class="fab fa-instagram"></i></a></li>
                        <li><a href="https://google.com/webtend"><i style="padding-top: 10px;" class="fab fa-google"></i></a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="widget footer-widget">
                     <h4 class="widget-title">Quick Links</h4>
                     <ul class="nav-widget clearfix">
                        <li><a href="/service">Latest Services</a></li>
                        <li><a href="/about">Our History</a></li>
                        <li><a href="/contact">Need A Career ?</a></li>
                        <li><a href="/our-staff">Meet The Team</a></li>
                        <li><a href="/service">Web Security</a></li>
                        <li><a href="/about">Setting &amp; Privacy</a></li>
                        <li><a href="/gallery">Case Study</a></li>
                        <li><a href="/about">About Use</a></li>
                        <li><a href="/service">Our Services</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="widget footer-widget">
                     <h4 class="widget-title">Recent News</h4>
                     <ul class="recent-post avson-go-top">
                         @foreach($blog as $item)
                        <li>
                           <div class="recent-post-img"><img src="upload/blog/{{$item->image}}" alt="News"></div>
                           <h6><a href="">{{$item->title}}</a></h6>
                           <span class="recent-post-date">{{$item->created_at}}</span>
                        </li>
                         @endforeach
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
                  <p class="copy-right text-right">Copyright ©2021. All Rights Reserved</p>
               </div>
            </div>
         </div>
      </div>
</footer>
