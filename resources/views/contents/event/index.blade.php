@extends('layouts.frontend')

@section('title','Events')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perlombaan</h1>
        </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($events as $event)     
        <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card">
                <img src="{{url('/temp/img/undraw_profile_2.svg')}}" class="card-img-top m-auto" style="height: 300px; width: 300px">
                <div class="card-body">
                    <h5 class="card-title">{{$event->Nama}}</h5>
                    <p class="card-text">{{$event->Desk}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection