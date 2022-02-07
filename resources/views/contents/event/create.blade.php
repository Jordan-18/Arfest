@extends('layouts.frontend')

@section('title','Events')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Event</h1>
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
<form action="{{route('store-event')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Poster</h6>
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
            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
        </div>
        <div class="card-body">
            <input type="file" name="file" id="file" hidden>
            <div class="mb-3">
                <label for="name" class="form-label">Name Event</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name Of events" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date Execution</label>
                <input type="date" name="date_execution" class="form-control" id="date" value="{{old('date_execution')}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Acara</label>
                <textarea class="form-control" name="desk" id="exampleFormControlTextarea1" rows="3" value="{{old('desk')}}"></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Submit</button>
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