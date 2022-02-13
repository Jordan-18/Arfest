@extends('layouts.frontend')

@section('title','Events Admin View')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Event</h1>
        <button href="#" class="btn btn-sm btn-success shadow-sm" type="button">&#10010; Add New</button>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="deleted">
        {{ session('success') }}
    </div>
    @endif
    
    {{-- alert-errors --}}
    @if ($errors->any() or session()->has('deleted'))
        <div class="alert alert-danger" role="alert" id="deleted">
            @if (session()->has('deleted'))    
                {{ session('deleted') }}
            @else
                Data Kirim Tidak Sesuai.
            @endif
        </div>
    @endif
    <!-- Start Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Event For Admin</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <form action="{{route('events')}}">
                  <div class="input-group mb-3">
                    <input class="form-control" list="datalistOptions" type="text" class="form-control" name="search" id="search"  placeholder="Search..." value="{{ request('search')}}" autocomplete="off">
                    <datalist id="datalistOptions">
                        <option value="PENDING">
                        <option value="PUBLISH">
                        <option value="REJECT">
                    </datalist>
                    <button class="btn btn-outline-primary" type="submit" id="btn-search" >
                        <i class="fas fa-search"></i>
                      </button>
                  </div>
                </form>
            </div>
        {{-- start Table User --}}
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poster</th>
                    <th>Publisher</th>
                    <th>Name Event</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $no => $event)
                <tr>
                    <td>{{  ++$no + ($events->currentPage()-1) * $events->perPage() }}</td>
                    <td><a href="{{ Storage::url($event->url)}}" target="_blank"><img src="{{ Storage::url($event->url)}}" style="height: 70px; width:70px"></a></td>
                    <td>{{ $event->userevent->name ?? 'Unknown'}}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->created_at->diffForHumans() }}</td>
                    <td>{{ $event->status }}</td>
                    <td>
                        <form action="{{route('event-action', $event->id)}}" method="POST">
                            @csrf
                            @if ($event->status == "REJECT")
                                <button name="event-action" title="DELETE" value="delete" type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you Sure ?')">
                                <i class="fas fa-trash"></i>
                              </button>
                            @else
                            <button name="event-action" title="REJECT" value="reject" type="submit" class="btn btn-warning btn-circle">
                                <i class="fas fa-times"></i>
                            </button>
                            @endif
                            @if ($event->status == "PUBLISH")
                            {{-- kosongkan --}}
                            @else
                            <button name="event-action" title="PUBLISH" value="publish" type="submit" class="btn btn-success btn-circle">
                                <i class="fas fa-check-double"></i>
                            </button> 
                            @endif
                            <button name="event-action" title="PENDING" value="pending" type="submit" class="btn btn-secondary btn-circle">
                                <i class="fas fa-pause"></i>
                            </button> 
                            
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Result {{ $events->total()}} </p>
        <div class="d-flex justify-content-center">
          {{ $events->links() }}
        </div>
        {{-- end table User --}}
        </div>
    </div>
</div>
</div>
<script>
setTimeout(() => {
    $('#deleted').slideUp('fast');
}, 1500);
</script>
@endsection