@extends('layouts.base')
@section('title','MoonLight - '.__('service'))
@section('active_service', 'active-page')
@section('content')
<main>
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
             style="background-image: url('/frontEnd/img/bg//breadcrumb-01.jpg');">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1>{{__('service')}}</h1>
                <ul class="list-inline">
                    <li><a href="/">{{__('home')}}</a></li>
                    <li><i class="fas fa-angle-double-right"></i></li>
                    <li>{{__('service')}}</li>
                </ul>
            </div>
        </div>
        <h1 class="big-text">Service</h1>
    </section>
    <section class="wcu-section section-padding" style="padding-top: 30px !important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="feature-accordion accordion" id="featureAccordion">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="active-accordion" data-toggle="collapse" data-target="#featureOne">
                                    {{__('introduce')}}
                                    <span class="open-icon"><i class="far fa-eye-slash"></i></span>
                                    <span class="close-icon"><i class="icon far fa-eye"></i></span>
                                </button>
                            </div>
                            <div id="featureOne" class="collapse show" data-parent="#featureAccordion">
                                <div class="card-body">{{__('introduceDes')}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#featureTwo">
                                    {{__('security')}}
                                    <span class="open-icon"><i class="icon far fa-eye-slash"></i></span>
                                    <span class="close-icon"><i icon class="far fa-eye"></i></span>
                                </button>
                            </div>
                            <div id="featureTwo" class="collapse" data-parent="#featureAccordion">
                                <div class="card-body">
                                    {{__('security_des')}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#featureThree">
                                    {{__('Dining')}}
                                    <span class="open-icon"><i class="icon far fa-eye-slash"></i></span>
                                    <span class="close-icon"><i class="icon far fa-eye"></i></span>
                                </button>
                            </div>
                            <div id="featureThree" class="collapse" data-parent="#featureAccordion">
                                <div class="card-body">
                                   {{__('Dining_Des')}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#featureFour">
                                    {{__('relex')}}
                                    <span class="open-icon"><i class="icon far fa-eye-slash"></i></span>
                                    <span class="close-icon"><i class="icon far fa-eye"></i></span>
                                </button>
                            </div>
                            <div id="featureFour" class="collapse" data-parent="#featureAccordion">
                                <div class="card-body">
                                    {{__('relexDes')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature-accordion-img text-right">
                        <img src="/frontEnd/img/tile-gallery/03.jpg" alt="Image"/>
                        <div class="degin-shape">
                            <div class="shape-one"><img src="/frontEnd/img/shape/11.png" alt="Shape"/></div>
                            <div class="shape-two"><img src="/frontEnd/img/shape/12.png" alt="Shape"/></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-section section-padding section-bg avson-go-top">
        <div class="container">
            <div class="section-title text-center">
                <span class="title-top">{{__('service')}}</span>
                <h1>
                    {{__('serviceDes')}}
                </h1>
            </div>
            <div class="row">
                @forelse($service as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single-service-box service-white-bg text-center wow fadeIn animated"
                         data-wow-duration="1500ms" data-wow-delay="400ms"
                         style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms;">
                        <span class="service-counter">{{$loop->index+1}}</span>
                        <img class="cover_Image" src="{{$item->image}}" alt="">
                        <h4>{{$item->name}}</h4>
                        <p style="height: 200px; overflow: hidden;">{{$item->description}}</p>
                        <a class="read-more" href="{{route('service.show',$item->id)}}">{{__('readmore')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                @empty
                    <p>No Service Here</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
