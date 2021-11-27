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
                <th>Total Anak Panah</th>
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
                    <a type="submit" data-toggle="modal" data-target="#JumlahAP">
                        &#10010; Add</a>
                  </th>
                  <th></th>
              </tr>
            </thead>
            <tbody class="table table-bordered text-center">
                @for ($i = 0; $i < 6; $i++)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-primary">Get</a>
                    </td>
                </tr>
                @endfor
            </tbody>
          </table>
        {{-- end --}}
    </div>
    <!-- /.container-fluid -->
@endsection