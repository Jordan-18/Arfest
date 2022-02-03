@extends('layouts.frontend')
@section('title','Event Edit')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Event &raquo; Edit &raquo; {{ $event->name }}</h1>
    </div>
    {{-- alert-errors --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert" id="error">
            Data Kirim Tidak Sesuai.
        </div>
    @endif
    <!-- Start Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Edit User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                </div>
                {{-- start form --}}
                <form method="POST" action="{{ route('event-update',$event->id)}} ">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name User" name="name" value="{{$event->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                        <option value="{{$event->status}}">{{$event->status}}</option>
                        <option disabled>-------------------------------</option>
                        <option value="PENDING">PENDING</option>
                        <option value="REJECT">REJECT</option>
                        <option value="PUBLISH">PUBLISH</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="">
                            <button type="submit" class="btn btn-success btn-icon-split m-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user-edit"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </form>
                    </div>  
                </form>
                {{-- end form --}}
            </div> 
        </div>
    </div>
    <div id="container"></div>
    {{-- end table --}}
</div>
<script>
    setTimeout(() => {
        $('#error').slideUp('fast');
    }, 1500);
    </script>
@endsection