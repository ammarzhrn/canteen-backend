@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
                <div class="section-header-button">
                    <a class="btn btn-primary" href="{{ route('product.create') }}">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Products</div>
                </div>
            </div>
            
            <div class="section-body">
                <h2 class="section-title">Products</h2>
                <p class="section-lead">
                    You can manage all products, such as editing, deleting and more.
                </p>
                @include('layouts.alert')

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="name"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>

                                        @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                @if ($item->image)
                                                <img src="{{asset('storage/products/'.$item->image)}}" class="rounded mr-3" width="100" height="100" alt="">
                                                @else
                                                <span class="badge badge-warning">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{$item->name}}
                                                <div class="table-links">
                                                    <a href="{{route('product.edit', $item->id)}}">Edit</a>
                                                    <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();">Trash</a>
                                                    <form action="{{route('product.destroy', $item->id)}}" method="POST" id="delete-form-{{$item->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                {{$item->description}}
                                            </td>
                                            <td>
                                                {{$item->category}}
                                            </td>
                                            <td>
                                                {{$item->price}}
                                            </td>
                                            <td>
                                                {{$item->stock}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
