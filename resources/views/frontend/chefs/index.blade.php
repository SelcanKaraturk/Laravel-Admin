@extends('frontend.layouts.master')

@section('content')

    <!-- breadcrumb start-->
    @include('frontend.partials.breadcrumb')
    <!-- breadcrumb start-->

    <!--::chefs_part start::-->
    <section class="chefs_part blog_item_section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <p>Team Member</p>
                        <h2>Our Experience Chefs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/team/chefs_1.png" alt="">
                        </div>
                        <div class="single_blog_text text-center">
                            <h3>Adam Billiard</h3>
                            <p>Chef Master</p>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/team/chefs_2.png" alt="">
                        </div>
                        <div class="single_blog_text text-center">
                            <h3>Fred Macyard</h3>
                            <p>Chef Master</p>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/team/chefs_3.png" alt="">
                        </div>
                        <div class="single_blog_text text-center">
                            <h3>Justin Stuard</h3>
                            <p>Chef Master</p>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 d-none d-sm-block d-lg-none">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/team/chefs_1.png" alt="">
                        </div>
                        <div class="single_blog_text text-center">
                            <h3>Justin Stuard</h3>
                            <p>Chef Master</p>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::chefs_part end::-->

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2>Expect The Best</h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                               href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->
    @endsection
