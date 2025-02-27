@extends('layouts.admin')
@section('content')
                    <div class="container-fluid px-4">
                        <div class="my-3">
                            <h1 class="mt-4 d-inline">Items</h1>
                            <a href="" class="btn btn-danger float-end">Cancel</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="index.html">Items</a></li>
                            <li class="breadcrumb-item active">Item Create</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Posts List
                            </div>
                            <div class="card-body">
                            <form action="{{route('backend.items.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="code_no" class="form-label">Code No</label>
                                    <input type="text" class="form-control @error('code_no') is-invalid @enderror" name="code_no" id="code_no" value="{{old('code_no')}}">
                                    @error('code_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
                                    @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
                                    @error('image')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}">
                                    @error('price')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="discount" class="form-label">Discount</label>
                                    <input type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" id="discount" value="{{old('discount')}}">
                                    @error('discount')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="">InStock</label>
                                    <select class="form-select @error('in_stock') is-invalid @enderror" name="in_stock" value="{{old('in_stock')}}" aria-label="Default select example">
                                        <option selected>Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                    @error('in_stock')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"  aria-label="Default select example">
                                        <option value="" selected>Choose Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"{{old('category_id')== $category->id?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"  rows="3">{{old('description')}}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </form>
                            </div>
                            
                        </div>
                    </div>
@endsection

