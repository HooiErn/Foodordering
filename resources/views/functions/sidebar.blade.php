<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            Admin's Page
            <img src="https://cdn-icons-png.flaticon.com/512/1/1819.png" style="width:30px;height:30px;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard主页</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Food -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/food') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Food食物</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/table') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Table桌子</span>
        </a>
    </li>
    
    <!-- Nav Item - Action List -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/action-list') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Action List行动表</span>
        </a>
    </li>

    <!-- Nav Item - Taken Order -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/takenOrder') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Current Order List</span>
        </a>
    </li>

    <!-- Nav Item - Waiters -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/waiter') }}">
           <i class="fas fa-fw fa-user"></i>
            <span>Waiters服务员</span>
        </a>
    </li>
    
    <!-- Nav Item - Setup Touch n Go -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/setup') }}">
            <i class="fas fa-fw fa-money"></i>
            <span>Touch n Go 线上付款</span>
        </a>
    </li>

    <!-- Nav Item - LogOut -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i>
            <span>Logout登出</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>