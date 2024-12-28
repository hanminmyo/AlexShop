@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Items</h1>
        <a href="{{route('backend.users.create')}}" class="btn btn-primary float-end">Create User</a>
    </div>
    <ol class="breadcrumb mb-4 ps-4">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Create User</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Payment
        </div>
        <div class="card-body">
            <form action="{{route('backend.users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" id="phone" name="phone">
                    @error('phone')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profile" class="form-label fw-bold">Profile</label>
                    <input type="file" class="form-control @error('profile') is-invalid @enderror" accept="image/*" id="profile" name="profile">
                    @error('profile')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">
                    @error('email')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                        <option value="" selected>Choose Role</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">SuperAdmin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection