@extends('layouts.home')
@section('content')
<section class="header_area">
        <div id="home" class="header_hero d-lg-flex align-items-center">        
            <div class="hero_shape shape_1">
                <img src="/images/shape/shape-1.svg" alt="shape">
            </div><!-- hero shape -->
            
            <div class="hero_shape shape_3">
                <img src="/images/shape/shape-3.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_4">
                <img src="/images/shape/shape-4.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_6">
                <img src="/images/shape/shape-1.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_7">
                <img src="/images/shape/shape-4.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_8">
                <img src="/images/shape/shape-3.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_9">
                <img src="/images/shape/shape-2.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_10">
                <img src="/images/shape/shape-4.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_11">
                <img src="/images/shape/shape-1.svg" alt="shape">
            </div><!-- hero shape -->
            <div class="hero_shape shape_12">
                <img src="/images/shape/shape-2.svg" alt="shape">
            </div><!-- hero shape -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header_hero_content">
                            <h2 class="hero_title wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">{{ trans('string.hero_text')}} <span>{{ trans('string.in_sea')}}</span></h2>
                            <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">{{ trans('string.about_system')}}</p>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s"><a class="main-btn" rel="nofollow" href="https://rebrand.ly/plain-ud">{{ trans('string.join_us')}}</a></li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header_shape d-none d-lg-block"></div>

            <div class="header_image d-flex align-items-center">
                <div class="image">
                    <img class="wow fadeInRightBig" data-wow-duration="2s" data-wow-delay="1.6s" src="/images/header-image.svg" alt="Header Image">
                </div>
            </div> <!-- header image -->
        </div> <!-- header hero -->
    </section>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section class="services_area" id="about">
        <div class="container">
           
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-7">
                    <div class="single_services text-center mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services_icon">
                            <i class="lni lni-write"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">{{trans('string.create_cv')}}</a></h3>
                            <p>65150+</span> {{trans('string.available_vacancies')}}</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-sm-7">
                    <div class="single_services text-center mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="services_icon">
                            <i class="lni lni-bulb"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">{{ trans('string.post_vacancy')}}</a></h3>
                            <p><span class="text-danger">145200+</span> {{trans('string.available_jobs')}}</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-sm-7">
                    <div class="single_services text-center mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <div class="services_icon">
                            <i class="lni lni-checkmark-circle"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">{{ trans('string.conduct_interview')}}</a></h3>
                            <p>{{ trans('string.interview_text')}}</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="why" class="about_area pt-115 ">
        <div class="about_image d-flex align-items-end justify-content-end">
            <div class="image">
                <img class="wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s" src="/images/about.svg" alt="about">
            </div>
        </div> <!-- about image -->
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="about_content wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="section_title pb-35">
                            <h5 class="sub_title">Why Choose Us</h5>
                            <h4 class="main_title">Your Goal is Our Achievement</h4>
                        </div> <!-- section title -->
                        <p>Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat sed diam voluptua. At vero eos et accusam et justo duo dolores et rebum. Stet clita kasd gubergren, no sea takimata sanctus. </p>
                        <ul class="about_list">
                            <li class="d-flex">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="about_list_content">
                                    <p>Vero eos et accusam et justo duo dolores et rebum. Stet clita kasd gubergrenv</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="about_list_content">
                                    <p>At vero eos et accusam et justo duo dolores et rebum. Stet clita kasd gubergrenv</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="about_list_content">
                                    <p>Dvero eos et accusam et justo duo dolores et rebum. Stet clita kasd gubergrenv</p>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="services" class="services_area pt-115 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h5 class="sub_title">What We Do</h5>
                        <h4 class="main_title">Our Services</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="services_icon">
                            <i class="lni lni-layout"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">Web Design</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                        <div class="services_icon">
                            <i class="lni lni-bullhorn"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">Digital Marketing</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                        <div class="services_icon">
                            <i class="lni lni-mobile"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">Mobile Apps</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="services_icon">
                            <i class="lni lni-seo"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">SEO Consultancy</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                        <div class="services_icon">
                            <i class="lni lni-layers"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">Graphic Design</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single_services text-center mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                        <div class="services_icon">
                            <i class="lni lni-briefcase"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="92" viewBox="0 0 94 92">
                                <path class="services_shape" id="Polygon_12" data-name="Polygon 12" d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content">
                            <h3 class="services_title"><a href="#">Business Consultancy</a></h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores </p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== WORK PART START ======-->

    <section id="work" class="work_area pt-115 pb-120">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <div class="section_title text-center pb-25">
                        <h5 class="sub_title">You are using free lite version of Plain</h5>
                        <h4 class="main_title">Please purchase full version to get all pages, features and permission to remove footer credits.</h4>
                    </div> <!-- section title -->
                    <a class="main-btn" href="https://rebrand.ly/plain-ud" rel="nofollow">Purchase Now</a>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== WORK PART ENDS ======-->

    <!--====== PRICING PLAN PART START ======-->

    <section id="pricing" class="pricing_area pt-115 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h5 class="sub_title">Pricing Plans</h5>
                        <h4 class="main_title">Choose Your Plan</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="pricing_menu mt-30 pb-30">
                        <ul class="nav justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <a id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-controls="yearly" aria-selected="false">Yearly</a>
                            </li>
                        </ul>
                    </div> <!-- pricing menu -->
                    
                    <div class="pricing_content_area">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                            <div class="pricing_title">
                                                <h4 class="title">Basic</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$19.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30 active wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1s">
                                            <div class="pricing_title">
                                                <h4 class="title">Standard</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$39.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.5s">
                                            <div class="pricing_title">
                                                <h4 class="title">Premium</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$99.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                            <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30">
                                            <div class="pricing_title">
                                                <h4 class="title">Basic</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$99.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30 active">
                                            <div class="pricing_title">
                                                <h4 class="title">Standard</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$199.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-7 col-sm-9">
                                        <div class="single_pricing text-center mt-30">
                                            <div class="pricing_title">
                                                <h4 class="title">Premium</h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="112" height="110" viewBox="0 0 112 110">
                                                    <path class="services_shape" id="Polygon_15" data-name="Polygon 15" d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" fill="#f94f4f"/>
                                                </svg>
                                            </div>
                                            <div class="pricing_content">
                                                <span class="pricing_price">$499.00</span>
                                                <p>Lorem ipsum dolor sit am consetetur sadi aliquyam erat sed diam voluptua vero eos  accusam et justo duo dolores </p>
                                                <a href="" class="main-btn">Choose Plan</a>
                                            </div>
                                        </div>  <!-- single pricing -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </div>
                    </div> <!-- pricing menu -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING PLAN PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    <section id="team" class="team_area pt-115 pb-120">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <div class="section_title text-center pb-25">
                        <h5 class="sub_title">You are using free lite version of Plain</h5>
                        <h4 class="main_title">Please purchase full version to get all pages, features and permission to remove footer credits.</h4>
                    </div> <!-- section title -->
                    <a class="main-btn" href="https://rebrand.ly/plain-ud" rel="nofollow">Purchase Now</a>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog" class="blog_area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h5 class="sub_title">Blog</h5>
                        <h4 class="main_title">From The Blog</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7">
                    <div class="single_blog mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="blog_image">
                            <img src="/images/blog-1.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <ul class="blog_meta d-flex justify-content-between">
                                <li>By: <a href="#">Musharof Chowdury</a></li>
                                <li>15 June 2024</li>
                            </ul>
                            <h3 class="blog_title"><a href="#">How to track your business revenue</a></h3>
                            <a href="#" class="more">Read More</a>
                        </div>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="single_blog mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.6s">
                        <div class="blog_image">
                            <img src="/images/blog-2.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <ul class="blog_meta d-flex justify-content-between">
                                <li>By: <a href="#">Musharof Chowdury</a></li>
                                <li>15 June 2024</li>
                            </ul>
                            <h3 class="blog_title"><a href="#">Improving products depending on feedback</a></h3>
                            <a href="#" class="more">Read More</a>
                        </div>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="single_blog mt-30 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.9s">
                        <div class="blog_image">
                            <img src="/images/blog-3.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <ul class="blog_meta d-flex justify-content-between">
                                <li>By: <a href="#">Musharof Chowdury</a></li>
                                <li>15 June 2024</li>
                            </ul>
                            <h3 class="blog_title"><a href="#">How to diversify your audience</a></h3>
                            <a href="#" class="more">Read More</a>
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact_area pt-70 pb-120">
        <div class="contact_image d-flex align-items-center justify-content-end">
            <div class="image">
                <img class="wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.4s" src="/images/contact.svg" alt="about">
            </div>
        </div> <!-- about image -->
        
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="contact_wrapper mt-45 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                        <div class="section_title pb-15">
                            <h5 class="sub_title">Contact</h5>
                            <h4 class="main_title">Get In Touch</h4>
                            <p>Lorem ipsum dolor sitrg amet, consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                        </div> <!-- section title -->
                        
                        <div class="contact_form">
                            <form id="contact-form" action="/contact.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_form">
                                            <input name="name" type="text" placeholder="Name">
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_form">
                                            <input name="email" type="email" placeholder="Email">
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div> <!-- single form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single_form">
                                            <button class="main-btn">Submit</button>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- contact form -->
                    </div> <!-- contact wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
@endsection
