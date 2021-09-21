@extends('layouts.base')
@section('title','MoonLight - '.__('contact'))
@section('active_contact', 'active-page')
@section('content')
<main>
<section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center" style="background-image: url('/frontEnd/img/bg//breadcrumb-01.jpg');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1>{{__('contact')}}</h1>
                    <ul class="list-inline">
                        <li><a href="/">{{__('home')}}</a></li>
                        <li><i class="fas fa-angle-double-right"></i></li>
                        <li>{{__('contact')}}</li>
                    </ul>
                </div>
            </div>
            <h1 class="big-text">Contact</h1>
</section>
<section class="contact-info-section section-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-5">
                      <div class="section-title">
                          <span class="title-top">Have A Coffee</span>
                          <h1>
                              Don't Hesitate To <br />
                              Contact Us
                          </h1>
                      </div>
                  </div>
                  <div class="col-lg-7">
                          <h1 style=" padding-bottom: 10px;">{{__('namehotel')}}</h1>
                          <p>{{__('hoteladdress')}}</p>
                          <p>{{__('tel')}}</p>
                          <p>{{__('hotelemail')}}</p>
                          <p>{{__('hotelfax')}}</p>
                      </p>
                  </div>
              </div>
          <div class="contact-info-boxes">
              <div class="row">
                  <div class="col-lg-4 col-md-6">
                      <div class="contact-info-box">
                          <div class="contact-icon"><i class="icon fas fa-map-marker-alt"></i></div>
                          <h4>Address</h4>
                          <p>90B Nguyễn Hữu Huân,Phố Cổ,Hoàn Kiếm ,Hà Nội</p>
                      </div>

                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="contact-info-box">
                          <div class="contact-icon"><i class="icon far fa-envelope-open"></i></div>
                          <h4>Email</h4>
                          <p><a href="#">reservation@moonlighthotel.com</a></p>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 mx-auto">
                      <div class="contact-info-box">
                          <div class="contact-icon"><i class="icon fas fa-phone"></i></div>
                          <h4>Phone Us</h4>
                          <p>{{__('hotelfax')}}</p>
                          <p>{{__('tel')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          </div>
</section>
<section class="contact-form section-padding">
            <div class="container">
                <div class="contact-form-wrap section-bg">
                    <h2 class="form-title">Send A Message</h2>
                    <form>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="input-wrap"><input type="text" placeholder="Your Full Name" value="@if(Auth::user() != null){{Auth::user()->name}}@endif" id="name" name="name" /><i class=" fas fa-user-alt"></i></div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="input-wrap"><input type="text" placeholder="Your Email" value="@if(Auth::user() != null){{Auth::user()->email}}@endif" id="email" name="email" /><i class=" fas fa-envelope"></i></div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="input-wrap"><input type="text" placeholder="Your Full Name" id="website" name="website" /><i class="fab fa-wordpress"></i></div>
                            </div>
                            <div class="col-12">
                                <div class="input-wrap text-area"><textarea placeholder="Write Message" name="msg"></textarea><i class="fas fa-pencil-alt"></i></div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn filled-btn">Send Message <i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</section>
</main>
@endsection
