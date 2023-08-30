<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .w3-sidebar {
        color: white !important;
        background-color: #007BFF !important;
        transition: background-color 0.3s, color 0.3s !important;
    }
    
    .w3-sidebar a{
        text-decoration: none !important;
    }

    .w3-sidebar a.w3-bar-item.w3-button:hover {
        background-color: #0056b3 !important; /* Darker shade of blue */
        color: white !important;
    }
    
    .w3-dropdown-hover .w3-button:hover,
    .w3-dropdown-hover .w3-button:focus {
        background-color: #007bff; /* Hover/active background color */
        color: white; /* Hover/active text color */
    }
</style>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;" id="mySidebar">
    <!-- Side Bar Title & Brand -->
    <a class="w3-bar-item w3-button d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon mt-4 mb-3">
            Admin's Page
            <img src="https://cdn-icons-png.flaticon.com/512/1/1819.png" style="width:30px;height:30px">
        </div>
    </a>
    
    <!-- Divider -->
    <hr>
    
    <!-- Dashboard -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard 主页</span>
    </a>
    
    <!-- Dashboard ( Matomo ) -->
    <!--<a class="w3-bar-item w3-button" href="{{ url('matomo') }}">-->
    <!--    <i class="fas fa-fw fa-tachometer-alt"></i>-->
    <!--    <span>Dashboard(Matomo) 主页</span>-->
    <!--</a>-->
    
    <!-- Analytics -->
    <a class="w3-bar-item w3-button" href="#" id="analytics-link">
        <i class="fas fa-fw fa-list"></i>
        <span>Analytics 分析</span>
    </a>
    <form id="analytics-form" method="POST" action="{{ url('admin/analytics') }}">
        @csrf
    </form>
    
    
    <!-- Divider -->
    <hr class="mr-2 ml-2">
    
    <!-- Bill -->
    <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fas fa-fw fa-money mr-1"></i><span>Bill 账单</span></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a class="w3-bar-item w3-button" href="{{ url('admin/allBills') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>List 列表</span>
            </a>
            <a class="w3-bar-item w3-button" href="{{ url('admin/bills') }}">
                <i class="fas fa-fw fa-history"></i>
                <span>Payment 付款</span>
            </a>
        </div>
    </div>
    
    <!-- Food -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/food') }}">
        <i class="fas fa-fw fa-utensils"></i>
        <span>Food 食物</span>
    </a>
    
    <!-- Stock -->
    <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fas fa-fw fa-boxes mr-1"></i><span>Stock 库存</span></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a class="w3-bar-item w3-button" href="{{ url('admin/stock') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>List 列表</span>
            </a>
            <a class="w3-bar-item w3-button" href="{{ url('admin/stock-history') }}">
                <i class="fas fa-fw fa-history"></i>
                <span>History 历史</span>
            </a>
        </div>
    </div>
    
    <!-- Table -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/table') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Table 桌子</span>
    </a>
    
    <!-- Action List -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/action-list') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Action List 行动表</span>
    </a>

    <!-- Taken Order -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/takenOrder') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Current Order List 当前订单列表</span>
    </a>
    
    <!-- Waiter Dropdown -->
    <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fas fa-users mr-1"></i><span>Waiters 服务员</span></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a class="w3-bar-item w3-button" href="{{ url('admin/waiter-list', ['id' => Auth::user()->id]) }}">
                <i class="fas fa-fw fa-list"></i>
                <span>List 列表</span>
            </a>
            <a class="w3-bar-item w3-button" href="{{ url('admin/waiter-report') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Report 报告</span>
            </a>
        </div>
    </div>
    
    <!-- Touch 'n Go -->
    <a class="w3-bar-item w3-button" href="{{ url('admin/setup') }}">
        <i class="fas fa-credit-card"></i>
        <span>Touch n Go 线上付款</span>
    </a>
    
    <!-- Divider -->
    <hr class="mr-2 ml-2">
    
    <!-- Logout -->
    <a class="w3-bar-item w3-button" href="{{ url('/logout') }}">
        <i class="fa fa-sign-out"></i>
        <span>Logout 登出</span>
    </a>
</div>

<script>
    document.getElementById('analytics-link').addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('analytics-form').submit();
    });
</script>