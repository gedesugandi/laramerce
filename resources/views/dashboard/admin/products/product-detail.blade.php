@extends('layouts.dashboard-layout')
@section('dashboard-content')
<!-- BEGIN: Content -->
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Detail Product
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-8">
                <div class="md:flex md:flex-row gap-5">
                    <div class="md:flex-shrink-0 basis-4/12 justify-center">              
                        <img class="featured-img" src="{{  asset($product->images->count() ? 'storage/' . $product->images->first()->src : 'dist/images/default.jpg') }}" alt="">
                        <div class="thumb-slide-wrapper mt-5 p-1">
                            <i id="arrow-left" class="arrow" data-lucide="chevron-left"></i>
                            <div class="thumb-slider" id="slider_thumbnail">
                                @foreach ($product->images as $index=>$img)
                                    <img class="thumbnail-product {{$index==0?'active_thumb':''}}"
                                     src="{{ asset('storage/'.$img->src) }}" alt="product_pic_{{$loop->iteration}}">
                                @endforeach
                            </div>

                            <i id="arrow-right" class="arrow" data-lucide="chevron-right"></i>
                        </div>  
                    </div>
                    <div class="md:flex-shrink-0 basis-5/12">
                        <div class="flex flex-row gap-2">
                            <label for="code" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Product Code</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->product_code }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="name" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Name</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->name }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="category" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Category</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->category->name }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="brand" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Brand</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->brand->name }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="condition" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Condition</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->condition }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="weight" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">weight</label>
                            <p class="basis-2/3 text-sm mb-2">: {{ $product->weight }}</p>
                        </div>
                        <div class="flex flex-row flex-none gap-2">
                            <label for="price" class="basis-1/3 capitalize tracking-wide text-sm text-black font-semibold mb-2">Price</label>
                            <p class="basis-2/3 text-sm mb-2">: Rp. {{number_format($product->price,0,",",".")}}</p>
                        </div>
                    </div>
                    <div class="md:flex basis-3/12">
                        <div class="box-content w-full h-fit p-4 border-2 rounded">
                            <p class="text-black font-semibold text-center">Product Sales</p>
                            <div class="border-solid border-black-600 mt-10">
                                <label for="wishlist_num" class="font-semibold">Number of Product Wishlist</label>
                                <input type="text" id="wishlist_num" class="form-control w-1/2" value="{{ $product->loved->count() }}"disabled>
                            </div>
                            <div class="">
                                <label for="order_num" class="font-semibold">Number of Orders</label>
                                <input type="text" id="order_num" class="form-control w-1/2" value="{{ $product->sold() }}"disabled>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-black mt-5 ml-2">
                    <p class="capitalize tracking-wide text-sm text-black font-semibold">Description</p>
                    <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
@endsection
@section('script')
<script src="{{ asset('dist/js/view/manage-product/product.js') }}"></script>
<script>
    jQuery(document).ready(function () {
    productImages();
});
</script>
@endsection