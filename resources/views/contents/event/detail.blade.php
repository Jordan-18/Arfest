@extends('layouts.frontend')

@section('title','Details Event')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perlombaan &raquo; {{$event->name}}</h1>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong><u>Name Event</u></strong></label>
                    <input type="text" name="name" class="event form-control-plaintext" id="name" value="{{$event->name}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label"><Strong><u>Date Execution</u></Strong></label>
                    <input type="text" name="date_execution" class="event form-control-plaintext" id="date" readonly value="{{date("F j, Y",strtotime($event->date_execution))}}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label"><strong><u>Event Description</u></strong></label>
                    <textarea class="event form-control-plaintext" name="desk" id="deskripsi" rows="3" style="height: 200px" readonly>{{$event->deskripsi}}</textarea>
                </div>
                <h6><strong> {{ $joins->total()}} Participant</strong></h6>
                @foreach ($joins as $join)
                <span class="badge rounded-pill bg-primary text-white">
                    {{ $join->userjoin->name }} 
                    <input type="button" type="submit" value="x" class="participant">
                </span>
                @endforeach
                <form action="{{route('event-join',$event->id)}}" method="POST">
                    @csrf
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-warning" type="submit">Join <i class="fa fa-users"></i></button>
                    </div>            
                </form>
            </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Poster</h6>
                </div>
                <div class="card-body">
                    <a href="{{Storage::url($event->url)}}" target="_blank"><img src="{{Storage::url($event->url)}}" class="card-img-top m-auto" style="height: 100%; width: 100%"></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection