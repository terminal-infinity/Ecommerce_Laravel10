@extends('master')

@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('frontend/images/bg-01.jpg') }})">
    <h2 class="ltext-105 cl0 txt-center">
        Shop
    </h2>
</section>	

    @include('frontend.pages.partials.product')

@endsection