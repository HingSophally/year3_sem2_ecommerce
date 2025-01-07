@extends('admin.index')
@section('main_content')
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Email Marketing</h3>
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
                            <div class="text-tiny">marketing</div>
                        </li>
                    </ul>
                </div>
                <!-- new-page-wrap -->
                <form class="form-new-page" method="POST" action="{{ route('emails.send') }}">
                    @csrf
                    <div class="new-page-wrap">
                        <div class="left">
                            <div class="wg-box">
                                <div class="widget-tabs">
                                    <ul class="widget-menu-tab">
                                        <li class="item-title active">
                                            <span class="inner"><span class="h6">New Email</span></span>
                                        </li>
                                    </ul>
                                    <div class="widget-content-tab">
                                        <div class="widget-content-inner active">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Subject<span class="tf-color-1">*</span></div>
                                                <input class="" type="text" placeholder="Subject" name="subject"
                                                    tabindex="0" value="{{ old('subject') }}" required>
                                            </fieldset>

                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Recipients<span class="tf-color-1">*</span>
                                                </div>
                                                <div class="recipient-selection">
                                                    <div class="mb-2">
                                                        <input type="checkbox" id="select-all">
                                                        <label for="select-all">Select All Users</label>
                                                    </div>
                                                    <div class="recipients-list"
                                                        style="max-height: 200px; overflow-y: auto;">
                                                        @foreach ($users as $user)
                                                            <div class="recipient-item">
                                                                <input type="checkbox" name="recipients[]"
                                                                    value="{{ $user->email }}"
                                                                    id="user-{{ $user->id }}" class="user-checkbox">
                                                                <label for="user-{{ $user->id }}">
                                                                    {{ $user->name }} ({{ $user->email }})
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="content">
                                                <div class="body-title mb-10">Content</div>
                                                <textarea class="textarea-tinymce" name="content">{{ old('content') }}</textarea>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="wg-box">
                                <div>
                                    <div class="body-title mb-10">Actions</div>
                                    <div class="flex gap10">
                                        <button class="tf-button style-1 w-full" type="submit" name="action"
                                            value="preview">Preview</button>
                                        <button class="tf-button w-full" type="submit" name="action"
                                            value="send">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /new-page-wrap -->

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
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the select all checkbox and all user checkboxes
                const selectAllCheckbox = document.getElementById('select-all');
                const userCheckboxes = document.querySelectorAll('.user-checkbox');

                // Add event listener to select all checkbox
                selectAllCheckbox.addEventListener('change', function() {
                    userCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });

                // Add event listeners to individual checkboxes
                userCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        // Check if all checkboxes are checked
                        const allChecked = Array.from(userCheckboxes).every(function(checkbox) {
                            return checkbox.checked;
                        });
                        // Update select all checkbox state
                        selectAllCheckbox.checked = allChecked;
                    });
                });

                // TinyMCE initialization (your existing code)
                tinymce.init({
                    selector: '.textarea-tinymce',
                    height: 500,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount emoticons template'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic forecolor backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | emoticons | template | help',
                    templates: [{
                            title: 'Welcome Email',
                            content: `
                        <h2>Welcome to Our Community!</h2>
                        <p>Dear [Name],</p>
                        <p>Thank you for joining us...</p>
                        <p>Best regards,<br>[Your Name]</p>
                    `
                        },
                        {
                            title: 'Newsletter',
                            content: `
                        <h2>Our Latest Updates</h2>
                        <p>Hello [Name],</p>
                        <p>Here are our latest updates...</p>
                        <p>Best regards,<br>[Your Name]</p>
                    `
                        }
                    ],
                    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; }',
                    setup: function(editor) {
                        editor.on('init', function() {
                            editor.setContent(
                                '<p>Dear recipient,</p><p>Your message here...</p><p>Best regards,<br>Your Name</p>'
                            );
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
