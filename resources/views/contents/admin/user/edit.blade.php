@extends('layouts.frontend')
@section('title','Edit User')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User &raquo; Edit &raquo; {{ $user->name }}</h1>
    </div>
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
                <form method="POST" action="{{route('update-user',$user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" placeholder="Name User" name="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles</label>
                        <select name="roles" id="roles" class="form-control">
                        <option value="{{$user->roles}}">{{$user->roles}}</option>
                        <option disabled>-------------------------------</option>
                        <option value="USER">USER</option>
                        <option value="ADMIN">ADMIN</option>
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
@endsection