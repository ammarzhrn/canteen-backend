@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">User</a></div>
                    <div class="breadcrumb-item">Create Product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create Product</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                    name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text"
                                    name="description"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number"
                                    name="price"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number"
                                    name="stock"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file"
                                    name="image"
                                        class="form-control">
                                </div>
                                <div class="section-title">Select Category</div>
                                <div class="form-group">
                                    <label class="form-label"></label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="food"
                                                class="selectgroup-input"
                                                checked="">
                                            <span class="selectgroup-button">Food</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="drink"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Drink</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="snack"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Snack</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                            </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
