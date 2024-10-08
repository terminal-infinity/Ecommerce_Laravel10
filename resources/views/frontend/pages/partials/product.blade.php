<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('home.shop') }}">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
                    All Products
                </button>
                </a>
                @foreach ($category as $category_item)
                @if ($category_item != '')
                <a href="{{ route('home.shop' , ['category' => $category_item->name ,  'brand' => request('brand')] ) }}">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 ">
                    {{ $category_item->name }}
                </button>
                </a>
                @endif
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                     Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>	
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ URL::current() }}" class="filter-link stext-106 trans-04 filter-link-active">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ URL::current()."?sort=popular" }}" class="filter-link stext-106 trans-04">
                                    Popural Product
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ URL::current()."?sort=newest" }}" class="filter-link stext-106 trans-04">
                                    Newest Product
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ URL::current() }}" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ URL::current()."?sort=price_asc" }}" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ URL::current()."?sort=price_desc" }}" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Brand
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ route('home.shop')}}" class="filter-link stext-106 trans-04">
                                    All
                                </a>
                            </li>
                            @foreach ($brand as $brand_item)
                            @if ($brand_item != '')
                            <li class="p-b-6">
                                <a href="{{ route('home.shop' , ['brand' => $brand_item->name , 'category' => request('category')] ) }}" class="filter-link stext-106 trans-04">
                                    {{ $brand_item->name }}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach ($product as $product_item)
            @if ($product_item != '')
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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

        <!-- Pagination -->
        <div class="flex-c-m flex-w w-full p-t-38">
            <div class="your-paginate mt-4">
                {{ $product->links() }}
            </div>
        </div>
    </div>
</section>