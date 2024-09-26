@extends('master')

@section('content')

@include('frontend.partials.header')
<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            <div class="item-slick1 bg-overlay1" style="background-image: url(frontend/images/slide-05.jpg);" data-thumb="{{ asset('frontend/images/thumb-01.jpg') }}" data-caption="Women’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Women Collection 2018
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                New arrivals
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url(frontend/images/slide-06.jpg);" data-thumb="{{ asset('frontend/images/thumb-02.jpg') }}" data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men New-Season
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                Jackets & Coats
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url(frontend/images/slide-07.jpg);" data-thumb="{{ asset('frontend/images/thumb-03.jpg') }} " data-caption="Men’s Wear">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                Men Collection 2018
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                NEW SEASON
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @foreach ($category as $category_item)
            @if ($category_item != '')
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="/categoryimage/{{$category_item->image}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                {{$category_item->name}}
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                Spring 2018
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>



<!-- Product -->
{{-- @include('frontend.pages.partials.product') --}}
<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Store Overview
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a href="{{ URL::current() }}" class="nav-link active" role="tab">All Product</a>
					</li>

					<li class="nav-item p-b-10">
						<a href="{{ URL::current()."?sort=newest" }}" class="nav-link" role="tab">Newest Product</a>
					</li>

					<li class="nav-item p-b-10">
						<a href="{{ URL::current()."?sort=popular" }}" class="nav-link" role="tab">Best Seller</a>
					</li>

				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
                                @foreach ($product as $product_item)
                                @if ($product_item != '')
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
                                        <div class="block2-pic hov-img0 label-new" data-label="New">
                                            <img src="/productimage/{{$product_item->image}}" alt="IMG-PRODUCT">
                    
                                            <a href="{{ route('home.product_details',$product_item->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 {{-- js-show-modal1 --}}">
                                                Add To Cart
                                            </a>
                                        </div>
                    
                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="{{ route('home.product_details',$product_item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $product_item->title }}
                                                </a>
                    
                                                <span class="stext-105 cl3">
                                                    ${{ $product_item->price }}
                                                </span>
                                                <a href="{{ route('home.product_details',$product_item->id) }}">
                                                    <button style="margin-top: 0.5cm; margin-left: 1cm;" class="flex-c-m stext-103 cl0 size-102 bg1 bor2 hov-btn1 p-15 trans-04">
                                                    View Details
                                                </button>
                                            </a>
                                            </div>
                    
                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png') }}" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
								</div>
                                @endif   
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Blog -->
@include('frontend.pages.partials.blog')


        <!-- Testimonial Start -->
        {{-- @include('frontend.pages.partials.tesmonial') --}}
        <!-- Testimonial End -->

@endsection