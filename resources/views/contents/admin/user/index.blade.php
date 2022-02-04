@extends('layouts.frontend')

@section('title','User')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Table Users</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <form action="{{route('user')}}">
                      <div class="input-group mb-3">
                        <input type="text" list="datalistOptions" class="form-control" name="search" id="search"  placeholder="Search..." value="{{ request('search')}}" autocomplete="off">
                        <datalist id="datalistOptions">
                            <option value="USER">
                            <option value="ADMIN">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Join At</th>
                        <th>Roles</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $no => $user)
                    <tr>
                        <td>{{  ++$no + ($users->currentPage()-1) * $users->perPage() }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->roles }}</td>
                        <td>
                            <form action="{{route('destroy-user', $user->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you Sure ?')">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{route('edit-user', $user->id)}}" class="btn btn-secondary btn-circle">
                                  <i class="fas fa-user-edit"></i>
                                </a>
                              </form>
                        </td>
                        <td>
                            {{-- check online / offline --}}
                            @if(Cache::has('user-is-online-' . $user->id))
                              <span class="text-success">Online</span>
                            @else
                              <span class="text-secondary">Offline</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Result {{ $users->total()}} </p>
            <div class="d-flex justify-content-center">
              {{ $users->links() }}
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