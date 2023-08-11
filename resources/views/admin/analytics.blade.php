@extends('layouts.admin')
@section('content')

<title>Admin Dashboard</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Analytics 分析</h1>
</div>

@php
    $totalActiveUsers = 0;
    $totalScreenPageViews = 0;
    
    foreach ($total as $item) {
        $totalActiveUsers += $item['activeUsers'];
        $totalScreenPageViews += $item['screenPageViews'];
    }
    
    
@endphp

<div class="row "> 
    <div class="col-md-12">
        <div class="card card-body border border-dark">
            <div class="row p-0 m-0">
                <div class="col-lg-6">
                    <div class="row mb-4">
                        <div class="col-auto">
                            <h3 class="p-0 m-0">{{$totalActiveUsers}} person 位</h3><br><h5 class="p-0 m-0">Total Active Users 总活跃用户</h5>
                        </div>
                        <div class="col-auto">
                            <h3 class="p-0 m-0">{{$totalScreenPageViews}}</h3><br><h5 class="p-0 m-0">Total Page Views 总页面浏览量</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2 m-1">
                            <button class="btn btn-outline-primary btn-sm" id="1days">Last 1 Day</button>
                            <form id="analytics-form-1" method="POST" action="{{ url('admin/analytics') }}">
                                @csrf
                                <input type="hidden" value="1" name="days">
                            </form>
                        </div>
                        <div class="col-md-2 m-1">
                            <button class="btn btn-outline-primary btn-sm" id="7days">Last 7 Days</button>
                            <form id="analytics-form-7" method="POST" action="{{ url('admin/analytics') }}">
                                @csrf
                                <input type="hidden" value="7" name="days">
                            </form>
                        </div>
                        <div class="col-md-2 m-1">
                            <button class="btn btn-outline-primary btn-sm" id="15days">Last 15 Days</button>
                            <form id="analytics-form-15" method="POST" action="{{ url('admin/analytics') }}">
                                @csrf
                                <input type="hidden" value="15" name="days">
                            </form>
                        </div>
                        <div class="col-md-2 m-1">
                            <button class="btn btn-outline-primary btn-sm" id="30days">Last 30 Days</button>
                            <form id="analytics-form-30" method="POST" action="{{ url('admin/analytics') }}">
                                @csrf
                                <input type="hidden" value="30" name="days">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-tabs nav-fill border-end-0 border-dark">
                        <li class="nav-item">
                            <a class="nav-link active custom-border" id="tab1" data-toggle="tab" href="#content1">Countries 国家</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-border" id="tab2" data-toggle="tab" href="#content2">Ip Addresses Ip地址</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="content1">
                            <div class="table-responsive border border-dark" style="height: 140px; overflow-y: auto;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Malaysia</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Singapore</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>China</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Vietnam</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Japan</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Korea</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>French</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="content2">
                            <div class="table-responsive border border-dark" style="height: 140px; overflow-y: auto;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>192.000.68.157</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>192.256.68.157</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>192.000.68.7</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>192.000.68.23</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>192.000.68.333</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>192.000.68.137</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>192.000.68.117</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
</div>

<div class="row">
    
</div>

<script>
    function submitForm(days) {
        const formId = `analytics-form-${days}`;
        document.getElementById(formId).submit();
    }

    document.getElementById('1days').addEventListener('click', function (event) {
        event.preventDefault();
        submitForm(1);
    });

    document.getElementById('7days').addEventListener('click', function (event) {
        event.preventDefault();
        submitForm(7);
    });

    document.getElementById('15days').addEventListener('click', function (event) {
        event.preventDefault();
        submitForm(15);
    });

    document.getElementById('30days').addEventListener('click', function (event) {
        event.preventDefault();
        submitForm(30);
    });
</script>

@endsection