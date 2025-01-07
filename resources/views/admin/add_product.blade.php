@extends('admin.index')
@section('main_content')
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Add Product</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                <div class="text-tiny">Ecommerce</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Add product</div>
                        </li>
                    </ul>
                </div>
                <!-- form-add-product -->
                <form class="tf-section-1 form-add-product" method="post" action="{{ route('admin.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter product name" name="name"
                                tabindex="0" value="" aria-required="true" required="">
                            <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>
                        </fieldset>

                        <fieldset class="brand">

                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>

                            <div class="select">
                                <select class="" name="category">
                                    <option>Choose category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Base Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter base price" name="base_price"
                                tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="description">
                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" rows="30" aria-required="true"
                                required="" name="description"></textarea>
                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Discount in Percentage
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter discount %" name="discount"
                                tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                    </div>
                    <button class="tf-button" type="submit">Add product</button>
                </form>
                <!-- /form-add-product -->
            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->
        <!-- bottom-page -->
        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 Remos. Design with</div>
            <i class="icon-heart"></i>
            <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All
                rights reserved.
            </div>
        </div>
        <!-- /bottom-page -->
    </div>
    <!-- /main-content -->
@endsection
