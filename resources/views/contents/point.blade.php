@extends('layouts.frontend')

@section('title','SKORING')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Skoring</h1>
          <button href="#" class="btn btn-sm btn-success shadow-sm" type="button" onclick="insertrow()">
              &#10010; Add New</button>
      </div>
              <!-- Start Table -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Point</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
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
                                  <th>{{Auth::user()->name}}</th>
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
                            <tbody class="table table-bordered text-center" id="mytable">
                              <tr>
                                <th>1</th>
                                <td colspan="2">0</td>
                                <td>
                                  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Set Point</a>
                                </td>
                                <td>
                                  <a href="" class="btn btn-danger">Delete</a>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4">Total</td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                          {{-- end --}}
                      </div> 
                </div>
            </div>
  </div>
    <!-- Modal add-point-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Masukkan Point</h5>
          <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
          </div>
          <div class="modal-body">
            {{-- start code --}}
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" id="display" class="form-control form-control-user" id="exampleFirstName"
                      placeholder="Counting">
              </div>
              <div class="col-sm-6">
                  <input type="text" id="result" class="form-control form-control-user" id="exampleLastName"
                      placeholder="Result">
              </div>
          </div>
              <table class="m-auto">
                <tr>
                  <td>
                    <button class="button btn-danger" id="point" onclick="dis('8')">8</button>
                  </td>
                  <td>
                    <button class="button btn-warning" id="point" onclick="dis('9')">9</button>
                  </td>
                  <td>
                    <button class="button btn-warning" id="point" onclick="dis('10')">10</button>
                  </td>
                  <td>
                    <button class="button btn-warning" id="point" onclick="dis('10')">10*</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button class="button btn-danger" id="point" onclick="dis('7')">7</button>
                  </td>
                  <td>
                    <button class="button btn-primary" id="point" onclick="dis('6')">6</button>
                  </td>
                  <td>
                    <button class="button btn-primary" id="point" onclick="dis('5')">5</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button class="button btn-white" id="point" onclick="dis('2')">2</button>
                  </td>
                  <td>
                    <button class="button btn-dark" id="point" onclick="dis('3')">3</button>
                  </td>
                  <td>
                    <button class="button btn-dark" id="point" onclick="dis('4')">4</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button class="button btn-white" id="point" onclick="dis('1')" >1</button>
                  </td>
                  <td>
                  </td>
                  <td>
                    <button class="but btn-primary" id="point" onclick="clr()">C</button>
                  </td>
                  <td>
                    <button type="submit" class="but btn-primary" id="point">Set Point</button>
                  </td>
                </tr>
              </table>
            {{-- end code --}}
          </div>
          </div>
      </div>
      </div>
  <!-- /Modal add-point-->


  <!-- Modal add-jarak-->
  <div class="modal fade" id="jarak" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Jarak Kamu dengan Target</h5>
          <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
          </div>
          <div class="modal-body">
              {{-- code here --}}

              {{-- end code --}}
          </div>
          </div>
      </div>
      </div>
  <!-- /Modal add-jarak-->


  <!-- Modal add-Jenis-->
  <div class="modal fade" id="jenis" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Jenis Busur</h5>
          <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
          </div>
          <div class="modal-body">
              {{-- code here --}}
              
              {{-- end code --}}
          </div>
          </div>
      </div>
      </div>
  <!-- /Modal add-jenis-->
@endsection