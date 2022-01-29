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
                <div class="card-body">
                    <img src="{{ Storage::url($event->url)}}" class="card-img-top m-auto" style="height: 300px;">
                    <h5 class="card-title mt-3">{{$event->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    <div class="d-flex justify-content-center">
    {{ $events->links() }}
    </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        setTimeout(() => {
            $('#deleted').slideUp('fast');
        }, 1500);
    </script>
@endsection