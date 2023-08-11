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
            <span>Dashboard 主页</span>
        </a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('matomo') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard(Matomo) 主页</span>
        </a>
    </li>
    
    <!-- Nav Item - Analytics -->
    <li class="nav-item">
        <a class="nav-link" href="#" id="analytics-link">
            <i class="fas fa-fw fa-list"></i>
            <span>Analytics 分析</span>
        </a>
    </li>
    <form id="analytics-form" method="POST" action="{{ url('admin/analytics') }}">
        @csrf
    </form>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Food -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/food') }}">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Food 食物</span>
        </a>
    </li>
    
    <!-- Nav Item - Stock -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#stockCollapse" role="button" aria-expanded="false" aria-controls="waitersCollapse">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Stock 库存</span>
        </a>
        <div class="collapse" id="stockCollapse">
            <a class="nav-link" href="{{ url('admin/stock') }}">
                <i class="fas fa-fw fa-boxes"></i>
                <span>List 列表</span>
            </a>
            <a class="nav-link" href="{{ url('admin/stock-history') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>History 历史</span>
            </a>
            
            
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/table') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Table 桌子</span>
        </a>
    </li>
    
    <!-- Nav Item - Action List -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/action-list') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Action List 行动表</span>
        </a>
    </li>

    <!-- Nav Item - Taken Order -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/takenOrder') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Current Order List 当前订单列表</span>
        </a>
    </li>

    <!-- Nav Item - Waiters -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#waitersCollapse" role="button" aria-expanded="false" aria-controls="waitersCollapse">
            <i class="fas fa-fw fa-user"></i>
            <span>Waiters 服务员</span>
        </a>
        <div class="collapse" id="waitersCollapse">
            <a class="nav-link" href="{{ url('admin/waiter-list', ['id' => Auth::user()->id]) }}">
                <i class="fas fa-fw fa-list"></i>
                <span>List 列表</span>
            </a>
            <a class="nav-link" href="{{ url('admin/waiter-report') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Report 报告</span>
            </a>
        </div>
    </li>
    
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('admin/waiter-list', ['id' => Auth::user()->id]) }}">-->
    <!--            <i class="fas fa-fw fa-list"></i>-->
    <!--            <span>List 列表</span>-->
    <!--        </a>-->
    <!--</li>-->
    
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="{{ url('admin/waiter-report') }}">-->
    <!--        <i class="fas fa-fw fa-file-alt"></i>-->
    <!--        <span>Report 报告</span>-->
    <!--    </a>-->
    <!--</li>-->
            
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
            <span>Logout 登出</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script>
    document.getElementById('analytics-link').addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('analytics-form').submit();
    });
</script>