        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @auth                
            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is('point') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('point')}}">
                    <i class="fas fa-sun"></i>
                    <span>Point</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Point -->
            <li class="nav-item {{ request()->is('event') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('event')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Event</span></a>
            </li>
            @endauth
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->