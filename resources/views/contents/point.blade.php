@extends('layouts.frontend')

@section('title','SKORING')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Skoring</h1>
          <button href="#" class="btn btn-sm btn-success shadow-sm" type="submit" data-toggle="modal" data-target="#staticBackdrop">
              &#10010; Add New</button>
      </div>
      {{-- start --}}
      <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>NAMA</th>
              <th>Jarak</th>
              <th>Tanggal</th>
              <th>Jenis Busur</th>
              <th>Rambahan</th>
            </tr>
            <tr>
                <th></th>
                <th>
                  <a type="submit" data-toggle="modal" data-target="#jarak">
                      &#10010; Add</a>
                </th>
                 <th id="date">{{($date)}}</th>
                <th>
                  <a type="submit" data-toggle="modal" data-target="#jenis">
                      &#10010; Add</a>
                </th>
                <th></th>
            </tr>
          </thead>
          <tbody class="table table-bordered text-center">
            {{-- Start Rambahan 1 --}}
            <tr>
              <th rowspan="2">1</th>
              <td></td>
              <td></td>
              <td></td>
              <td rowspan="2">
                <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#staticBackdrop">Get Point</button>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            {{-- End Rambahan 1 --}}
            {{-- Start Rambahan 1 --}}
            <tr>
              <th colspan="4">Jumlah</th>
              <td></td>
            </tr>
            {{-- End Rambahan 1 --}}
          </tbody>
        </table>
      {{-- end --}}
  </div>
@endsection