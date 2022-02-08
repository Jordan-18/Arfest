@extends('layouts.frontend')

@section('title','Scoring')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Your Score</h1>
          <button href="#" class="btn btn-sm btn-success shadow-sm" type="submit" data-target="#create" data-toggle="modal">
              &#10010; Add New</button>
      </div>
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert" id="success">
          {{ session('success') }}
      </div>
      @endif

      <div class="row row-cols-1 row-cols-md-4 g-4 m-auto">
        @foreach ($points as $point)
        <div class="col mb-2">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">{{date("F j, Y",strtotime($point->created_at))}}</h5>
              @auth
                @if (Auth::user()->roles == "ADMIN")
                  <p class="card-text">User  : <strong>{{ $point->userpoint->name ?? 'Guest'}}</strong></p>
                @endif
              @endauth
              <p class="card-text">Jenis  : <strong>{{ $point->jenis_busur }}</strong></p>
              <p class="card-text">Jarak  : <strong>{{ $point->jarak }}</strong></p>
              <p class="card-text">Total  : <strong>{{ $point->total.'/'.($point->jumAP*10)*$point->rambahan }}</strong></p>

              @php
                  $presentase = ($point->total/( ($point->jumAP*10) * $point->rambahan )) * 100
              @endphp
              @if ( $presentase >= 75 )
                <p class="card-text">
                  Presentase  :
                  <strong style="color: #2bff00">
                    {{ round($presentase,2).'%' }}
                  </strong>
                </p>
              @elseif ($presentase > 40)
                <p class="card-text">
                  Presentase  :
                  <strong style="color: #ff9800">
                    {{ round($presentase,2).'%' }}
                  </strong>
                </p>
              @else
                <p class="card-text">
                  Presentase  :
                  <strong style="color: #ff0000">
                    {{ round($presentase,2).'%' }}
                  </strong>
                </p>
              @endif
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="">Detail &raquo;</a>
              </div>

            </div>
          </div>
        </div>
        @endforeach
      </div>
            
    </div>
    <div class="d-flex justify-content-center">
      {{ $points->links() }}
    </div>
  <!-- Modal add -->
  <div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create New</h5>
        <button type="button" id="close-modal-busur" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
        </div>
        <div class="modal-body">
            {{-- code here --}}
            <form action="{{ route('create-point')}}">
              <div class="mb-3">
                <label for="rambahan" class="form-label">Jumlah Rambahan</label>
                <select name="rambahan" id="rambahan" class="form-control" required>
                  <option value="1" selected>Pilih Jumlah Rambahan</option>
                  <option disabled>-------------------------------</option>
                  <option value="3">3</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="12">12</option>
                </select>
            </div>
              <div class="mb-3">
                <label for="jumlahAP" class="form-label">Jumlah Anak Panah</label>
                <select name="jumlahAP" id="jumlah-ap" class="form-control" required>
                  <option value="1" selected>Pilih Jumlah Anak Panah</option>
                  <option disabled>-------------------------------</option>
                  <option value="3">3</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="12">12</option>
                </select>
            </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
            {{-- end code --}}
        </div>
        </div>
    </div>
    </div>
<!-- /Modal add -->

<script>
  setTimeout(() => {
      $('#success').slideUp('fast');
  }, 1500);
  </script>
@endsection