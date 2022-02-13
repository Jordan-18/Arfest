        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panahan<sup>🏆</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            @auth
            @if (Auth::user()->roles == 'ADMIN')                
            <!-- Akses Untuk Admin -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is(['user','events']) ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseTwo" class="collapse {{ request()->is(['user','events']) ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Access:</h6>
                        <a class="collapse-item {{ request()->is('user') ? 'active' : ''}}" href="{{route('user')}}">Users</a>
                        <a class="collapse-item {{ request()->is('events') ? 'active' : ''}}" href="{{route('events')}}">Event</a>
                    </div>
                </div>
            </li>
            @elseif (Auth::user()->roles == "PUBLISHER")
            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is('create/event') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('create-event')}}">
                    <i class="fas fa-plus-square"></i>
                    <span>Event Create</span></a>
            </li>
            @endif                
            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is(['point','point/create']) ? 'active' : ''}}">
                <a class="nav-link" href="{{route('point')}}">
                    <i class="fas fa-sun"></i>
                    <span>Point</span></a>
            </li>
            @endauth
            @guest
            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is(['point','point/create']) ? 'active' : ''}}">
                <a class="nav-link" href="{{route('point')}}">
                    <i class="fas fa-sun"></i>
                    <span>Point Guest</span>
                </a>
            </li>
            @endguest
            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is('event') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('event')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                <span>Event</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->