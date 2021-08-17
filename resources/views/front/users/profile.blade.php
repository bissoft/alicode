@extends('front.layouts.app')
@section('content')
<section class="hero-section banner1-bg relative section-padding" id="home">

    <div class="hero-section-content">

        <div class="container h-100">
            <div class="row h-100 mb-50 align-items-center">

                <!-- Welcome Content -->
                <div class="col-12 col-lg-8 col-md-12 mx-auto">
                    {{-- @foreach ($banner as $ban) --}}

                    <div class="welcome-content">
                        <div class="promo-section">
                            {{-- <h3 class="special-head gradient-text cyan">Creative Montaring IT Solutions Agency</h3> --}}
                            <h3 class="special-head gradient-text cyan">{{$user->name}}</h3>
                        </div>
                        {{-- <h1 class="w-text fadeInUp" data-wow-delay="0.2s">Your IT Montaring is our top priority with Our Creative <span class="gradient-text cyan">Best idea Solutions.</span></h1> --}}
                        <h1 class="w-text fadeInUp" data-wow-delay="0.2s">{{$user->email}} <span class="gradient-text cyan">{{$user->subdomain}}.</span></h1>
                        {{-- <p class="g-text fadeInUp" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae soluta, dignissimos aut, assumenda dolore totam natus qui cum vel omnis voluptates.</p> --}}
                        <p class="g-text fadeInUp" data-wow-delay="0.3s">{{$user->address}}</p>
                        <div class="more-btn-group fadeInUp" data-wow-delay="0.4s">
                            <a href="#" class="btn more-btn mr-3">contact us</a>
                            <a href="#" class="btn more-btn"> Learn more</a>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
               <!--  <div class="col-lg-6 col-md-12">
                    <div class="hos-img-header">
                        <img src="img/bg-img/banner-img.png" class="wow fadeInRight" data-wow-delay="0.4s" alt="">
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</section>
@endsection
