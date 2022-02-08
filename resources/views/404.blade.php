@extends('layouts.frontend')
@section('tittle','Page Not Found')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <a href="{{route('index')}}" style="color: #ff9800">&larr; Back to Dashboard</a>
        </div>

    </div>
    <!-- /.container-fluid -->
    
@endsection