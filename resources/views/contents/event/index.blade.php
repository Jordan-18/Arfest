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
                <div class="card">
                    <div class="card-body">
                        <img src="{{ Storage::url($event->url)}}" class="card-img-top m-auto" style="height: 100%; width: 100%">
                        <h5 class="m-0 font-weight-bold text-secondary mt-2 font-italic">{{$event->name}}</h5>
                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;" class="card-title mt-3">{{$event->deskripsi}}</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('event-detail',$event->id)}}">Detail &raquo;</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        {{date("F j, Y",strtotime($event->date_execution))}}
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
@endsection