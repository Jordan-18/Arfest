        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Arfest<sup>🏆</sup></div>
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
                        <a class="nav-link {{ request()->is(['user','events']) ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Admin</span>
                        </a>
                        <div id="collapseOne" class="collapse {{ request()->is(['user','events']) ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Admin Access:</h6>
                                <a class="collapse-item {{ request()->is('user') ? 'active' : ''}}" href="{{route('user')}}">
                                    <i class="fas fa-users"></i> Users
                                </a>
                                <a class="collapse-item {{ request()->is('events') ? 'active' : ''}}" href="{{route('events')}}">
                                    <i class="fas fa-calendar-check"></i> Event
                                </a>
                            </div>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->roles == 'PUBLISHER' || Auth::user()->roles == 'ADMIN')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('create-event') ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-calendar-check"></i>
                        <span>Publisher</span>
                    </a>
                    <div id="collapseTwo" class="collapse {{ request()->is('create-event') ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Publisher Access:</h6>
                            <a class="collapse-item {{ request()->is('create-event') ? 'active' : ''}}" href="{{route('create-event')}}">
                                <i class="fas fa-plus-square"></i> Create Event
                            </a>
                        </div>
                    </div>
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
