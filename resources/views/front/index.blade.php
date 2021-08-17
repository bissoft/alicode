@extends('front.layouts.app')
@section('content')
<section class="hero-section banner1-bg relative section-padding" id="home">

    <div class="hero-section-content">

        <div class="container h-100">
            <div class="row h-100 mb-50 align-items-center">

                <!-- Welcome Content -->
                <div class="col-12 col-lg-8 col-md-12 mx-auto">
                    @foreach ($banner as $ban)

                    <div class="welcome-content">
                        <div class="promo-section">
                            {{-- <h3 class="special-head gradient-text cyan">Creative Montaring IT Solutions Agency</h3> --}}
                            <h3 class="special-head gradient-text cyan">{{$ban->title}}</h3>
                        </div>
                        {{-- <h1 class="w-text fadeInUp" data-wow-delay="0.2s">Your IT Montaring is our top priority with Our Creative <span class="gradient-text cyan">Best idea Solutions.</span></h1> --}}
                        <h1 class="w-text fadeInUp" data-wow-delay="0.2s">{{$ban->head}} <span class="gradient-text cyan">{{$ban->sub_head}}.</span></h1>
                        {{-- <p class="g-text fadeInUp" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae soluta, dignissimos aut, assumenda dolore totam natus qui cum vel omnis voluptates.</p> --}}
                        <p class="g-text fadeInUp" data-wow-delay="0.3s">{{$ban->description}}</p>
                        <div class="more-btn-group fadeInUp" data-wow-delay="0.4s">
                            <a href="{{url('/about-us')}}" class="btn more-btn mr-3">About us</a>
                            <a href="#" class="btn more-btn"> Learn more</a>
                        </div>
                    </div>
                    @endforeach
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
<div class="clearfix"></div>
<section class="further-details">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)


        <div class="col-12 col-md-4 mt-3">
            <div class="card sahdow">
                <img class="card-img" src="{{asset('uploads/products/'.$product->image)}}" class="w-100">
                <div class="p-2">
                    <h6>{{$product->name}}</h6>
                    <p>{{$product->description}}</p>
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-primary mr-3">Find more</button>
                     <button class="btn btn-primary  ">Join </button>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</section>
@endsection
