@extends('admin.index')
@section('main_content')
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
                <form class="form-add-product" method="post" action="{{ route('admin.create_detail') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Choose Product</div>
                            <div class="select mb-10">
                                <select class="" name="product_id">
                                    <option disabled selected>Choose Product</option>
                                    @foreach ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="body-title mb-10">Upload images</div>
                            <div class="upload-image mb-16">
                                <div class="item up-load">
                                    <label class="uploadfile" for="file1">

                                        <span class="text-tiny" id="textDisplay1">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="file1" name="filename1"
                                            onchange="previewImage(event, 'preview1', 'textDisplay1')">
                                    </label>
                                    <img id="preview1" src="" style="display:none;" />
                                </div>

                                <div class="item up-load">
                                    <label class="uploadfile" for="file2">

                                        <span class="text-tiny" id="textDisplay2">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="file2" name="filename2"
                                            onchange="previewImage(event, 'preview2', 'textDisplay2')">
                                    </label>
                                    <img id="preview2" src="" style="display:none;" />
                                </div>

                                <div class="item up-load">
                                    <label class="uploadfile" for="file3">
                                        <span class="text-tiny" id="textDisplay3">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="file3" name="filename3"
                                            onchange="previewImage(event, 'preview3', 'textDisplay3')">
                                    </label>
                                    <img id="preview3" src="" style="display:none;" />
                                </div>

                            </div>
                            <div class="body-text">You need to add at least 4 images. Pay attention to the quality of
                                the pictures you add, comply with the background color standards. Pictures must be in
                                certain dimensions. Notice that the product shows all the details
                            </div>
                        </fieldset>
                        {{-- <fieldset class="name">
                            <div class="body-title mb-10">Additional Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter additional price"
                                name="additional_price" tabindex="0" value="" aria-required="true" required="">
                        </fieldset> --}}
                        {{--                        <fieldset class="name"> --}}
                        {{--                            <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div> --}}
                        {{--                            <input class="mb-10" type="text" placeholder="Enter quantity" name="quantity" --}}
                        {{--                                   tabindex="0" value="" aria-required="true" required=""> --}}
                        {{--                        </fieldset> --}}
                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Add size</div>
                                <div class="select mb-10">
                                    <select class="" name="size">
                                        <option disabled selected>Choose size</option>
                                        @foreach ($size as $item)
                                            <option value="{{ $item->id }}">{{ $item->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Add Color</div>
                                <div class="select mb-10">
                                    <select class="" name="color">
                                        <option disabled selected>Choose Color</option>
                                        @foreach ($color as $item)
                                            <option value="{{ $item->id }}">{{ $item->color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>

                        </div>
                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Additional Price for size<span class="tf-color-1">*</span>
                                </div>
                                <input class="mb-10" type="text" placeholder="Enter additional price"
                                    name="additional_price_size" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Additional Price for color <span class="tf-color-1">*</span>
                                </div>
                                <input class="mb-10" type="text" placeholder="Enter additional price"
                                    name="additional_price_color" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                        </div>
                        <div class="cols gap10">
                            <button class="tf-button" type="submit">Add product</button>
                            <button class="tf-button style-1" type="submit">Save product</button>
                        </div>
                    </div>
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
    <script>
        function previewImage(event, previewId, textDisplayId) {
            const imagePreview = document.getElementById(previewId);
            const textDisplay = document.getElementById(textDisplayId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Display the image preview
                    textDisplay.style.display = 'none'; // Hide the text
                };

                reader.readAsDataURL(file); // Convert image file to base64 string
            } else {
                imagePreview.src = "";
                imagePreview.style.display = 'none'; // Hide the preview if no file is selected
                textDisplay.style.display = 'block'; // Show the text again if no file is selected
            }
        }
    </script>
@endsection
