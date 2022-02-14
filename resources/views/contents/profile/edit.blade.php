@extends('layouts.frontend')

@section('title','Profile Page')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile &raquo; {{$user->name}}</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="popup">
        {{ session('success') }}
    </div>
    @endif
    {{-- alert-errors --}}
    @if ($errors->any())
    <div class="alert alert-danger" role="alert" id="popup">
      Input Kurang
    </div>
    @endif
<form action="{{route('profile-update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Poster</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie shadow">
                    <div class="drag-area">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <header>Drag & Drop to Upload Poster</header>
                        <span>OR</span>
                        <button class="images-upload" type="button">Browse File</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Profile Details</h6>
        </div>
        <div class="card-body">
            <img src="{{ Storage::url($user->url) }}" class="mx-auto d-block" id="profile" name="file">
            <div class="mb-3" hidden>
                <label for="name" class="form-label">Upload</label>
                <input type="file" name="file" id="file" class="form-control">
                <input type="text" name="oldfile" id="oldfile" class="form-control" value="{{$user->url}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name Of events" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Change Password" autocomplete="off">
                <input type="text" name="oldpassword" class="form-control" value="{{$user->password}}" hidden>
                <div class="custom-control custom-checkbox mt-3">
                    <input type="checkbox" class="custom-control-input" id="showpassword">
                    <label class="custom-control-label" for="showpassword" onclick="showpassword()">Show password</label>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
        </div>
    </div>
    </div>
</form>
</div>
<script>
    setTimeout(() => {
        $('#popup').slideUp('fast');
    }, 1000);
</script>
@endsection