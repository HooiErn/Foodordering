@extends('layouts.admin')
@section('content')

<title>Waiter</title>

<style>
    #name{
        text-decoration:none;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Waiter 服务员</h1>
</div>

<form action="{{ route('admin.waiter.searchDate') }}" method="POST">
    @csrf
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col-sm-1 text-right">
            <label for="from" class="col-form-label">From:</label>
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control form-control-sm" id="from" name="from" required>
        </div>
        <div class="col-sm-1 text-right">
            <label for="to" class="col-form-label">To:</label>
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control form-control-sm" id="to" name="to" required>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-sm" name="search" title="Search"><i class="fas fa-search"></i></button>
            <a href="{{ url('admin/waiter-report') }}" class="btn btn-danger btn-sm ml-2 text-white" onclick="clearLocalStorage()" style="text-decoration: none;">Default</a>
        </div>
    </div>
</form>

<div class="row">
        <div class="table-responsive ml-5 mr-5">
            <table class="table table-bodered" id="body">
                <thead>
                    <tr>
                        <td>Name 名字</td>
                        <td>Cash 现金 (RM)</td>
                        <td>Tng 线上付款(RM)</td>
                        <td>Total Bills 账单总和</td>
                        <td>Total Work 总工作数量</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($waiters -> where('deleted', 1) as $waiter)
                    <tr>
                        <td><a href="#" onclick="view('{{$waiter -> name}}')" style="text-decoration: none;">{{$waiter -> name}}</a></td>
                        <td><span class="cash">RM {{number_format($orders -> where("waiter", $waiter -> name) -> where("payment_method",1) -> sum("amount"),2)}}</span></td>
                        <td><span class="tng">RM {{number_format($orders -> where("waiter", $waiter -> name) -> where("payment_method",2) -> sum("amount"),2)}}</span></td>
                        <td>{{count($orders -> where("waiter", $waiter -> name))}}</td>
                        <td>{{count($works -> where('waiter', $waiter -> name))}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-right"> <b>Total总和 :</b></td>
                        <td><b><span class="t-cash"></span></b></td>
                        <td><b><span class="t-tng"></span></b></td>
                        <td><b>{{count($orders -> where('status',1))}}</b></td>
                        <td><b>{{count($works -> where('waiter','!=',null))}}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var $body = $('#body');
        
        function calculate() {
            var cashTot = 0.00;
            var tngTot = 0.00;
    
            // Loop through the rows and sum up the order amounts
            $body.find('.cash').each(function() {
                var amountText = $(this).text().trim(); // Remove leading/trailing spaces
                var amountValue = parseFloat(amountText.replace('RM', '').replace(',', '')); // Remove "RM" and parse
                cashTot += amountValue;
            });
            
            $body.find('.tng').each(function() {
                var amountText = $(this).text().trim(); // Remove leading/trailing spaces
                var amountValue = parseFloat(amountText.replace('RM', '').replace(',', '')); // Remove "RM" and parse
                tngTot += amountValue;
            });
            
            // Format and display the total amounts using Intl.NumberFormat
            var formatter = new Intl.NumberFormat('en-MY', {
                style: 'currency',
                currency: 'MYR',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            
            $body.find('.t-cash').each(function(){
                $(this).text(formatter.format(cashTot));
            })
            
            $body.find('.t-tng').each(function(){
                $(this).text(formatter.format(tngTot));
            })
        }
        
        calculate();
    });
</script>

<script scr="text/javascript">
    function view(name){
        console.log(name);
        window.location.href = "/viewOrder/" + name;
    }
</script>
<script>
    $(document).ready(function() {
        $('.close').on('click', function() {
            $(this).closest('.modal').modal('hide');
        });
        
        // Get the current date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0];
    
        // Set the current date as the default value for the input field
        document.getElementById('to').value = today;
        
        document.getElementById('from').value = today;
        
        function clearLocalStorage() {
            localStorage.removeItem("fromDate");
            localStorage.removeItem("toDate");
        }
        
        // Get the default dates from localStorage or set them to today's date
        var fromDate = localStorage.getItem("fromDate") || new Date().toISOString().split('T')[0];
        var toDate = localStorage.getItem("toDate") || new Date().toISOString().split('T')[0];
    
        // Set the values of the input fields
        $('input[name=from]').val(fromDate);
        $('input[name=to]').val(toDate);
    
        // Update localStorage when the input values change
        $('input[name=from]').change(function() {
            localStorage.setItem("fromDate", $(this).val());
        });
    
        $('input[name=to]').change(function() {
            localStorage.setItem("toDate", $(this).val());
        });
    });
</script>

@endsection