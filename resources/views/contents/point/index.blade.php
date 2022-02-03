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

      <div class="row row-cols-1 row-cols-md-4 g-4 m-auto">
        @foreach ($points as $point)
        <div class="col mb-2">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">{{date("F j, Y",strtotime($point->created_at))}}</h5>
              <table class="table table-bordered">
                <tr>
                  <th>Jenis</th>
                  <td>{{ $point->jenis_busur }}</td>
                </tr>
                <tr>
                  <th>Jarak</th>
                  <td>{{ $point->jarak }}</td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>{{ $point->Total }}</td>
                </tr>
              </table>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="">Detail &raquo;</a>
              </div>

            </div>
          </div>
        </div>
        @endforeach
      </div>
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
                <label for="rambahan" class="form-label">Status</label>
                <select name="rambahan" id="rambahan" class="form-control">
                  <option selected disabled>Pilih Jumlah Rambahan</option>
                  <option disabled>-------------------------------</option>
                  <option value="3">3</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="12">12</option>
                  <option value="24">24</option>
                </select>
            </div>
              <div class="mb-3">
                <label for="jumlah-ap" class="form-label">Status</label>
                <select name="jumlah-ap" id="jumlah-ap" class="form-control">
                  <option selected disabled>Pilih Jumlah Anak Panah</option>
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
@endsection