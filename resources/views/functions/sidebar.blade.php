<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Food -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/food') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Food</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/table') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Table</span>
        </a>
    </li>

    <!-- Nav Item - Waiters -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/waiter') }}">
           <i class="fas fa-fw fa-user"></i>
            <span>Waiters</span>
        </a>
    </li>
    
    <!-- Nav Item - Setup Touch n Go -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/setup') }}">
            <i class="fas fa-fw fa-money"></i>
            <span>Touch n Go</span>
        </a>
    </li>

    <!-- Nav Item - LogOut -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/logout') }}">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>