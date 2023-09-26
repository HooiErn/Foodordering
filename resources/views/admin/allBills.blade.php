@extends('layouts.admin')
@section('content')

<title>Bill</title>

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">All Bills 全部账单</h1>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <input type="date" class="form-control form-control-inline mb-3" name="from_date" id="from_date" value="{{ date('Y-m-d') }}" >
    </div>
    <div class="col-md-3">
        <input type="date" class="form-control form-control-inline mb-3" name="to_date" id="to_date" value="{{ date('Y-m-d') }}">
    </div>
    <div class="col-md-1">
        <a href="#" class="btn btn-secondary btn-block" id="clearSearch"><i class="fas fa-undo"></i></a>
    </div>
    <div class="col-md-1">
        <a href="#" class="btn btn-danger btn-block" id="clearAll"><i class="fas fa-times-circle"></i></a>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row" id="filtered_dates_container">
     <!--Dates will be displayed here -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Cash</th>
                        <th>Tng</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="dateBody">
                    <tr>
                        <td colspan="4">Please Select A Date To Display Result</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var $dateBody = $("#dateBody");
        var orders = @json($orders);
        
        if (localStorage.getItem("allbill_from_date") !== null) {
            $('#from_date').val(localStorage.getItem("allbill_from_date"));
        }
        if (localStorage.getItem("allbill_to_date") !== null) {
            $('#to_date').val(localStorage.getItem("allbill_to_date"));
        }

        $('#from_date').on('change', function() {
            localStorage.setItem("allbill_from_date", $(this).val());
            filterTable();
        });
        
        $('#to_date').on('change', function() {
            localStorage.setItem("allbill_to_date", $(this).val());
            filterTable();
        });
    
        // Event listener for clearSearch button
        $('#clearSearch').on('click', function() {
            $('#from_date').val('{{ date('Y-m-d') }}');
            $('#to_date').val('{{ date('Y-m-d') }}');
            localStorage.clear();
            filterTable();
        });
    
        // Event listener for clearDate button
        $('#clearAll').on('click', function() {
            $('#from_date').val('');
            $('#to_date').val('');
            localStorage.clear();
            filterTable();
            var row = `
                <tr>
                    <td colspan="4">Please Select A Date To Display Result</td>
                </tr>
            `;
            $dateBody.append(row);
        });
        
        
        
        function filterTable() {
            var fromDate = new Date($("#from_date").val());
            var toDate = new Date($("#to_date").val());
            var cashSum = 0.00;
            var tngSum = 0.00;
            var totalSum = 0.00;
    
            $dateBody.empty();
    
            var filteredDates = [];
            var currentDate = new Date(fromDate);
    
            while (currentDate <= toDate) {
                filteredDates.push(currentDate.toISOString().split('T')[0]);
                currentDate.setDate(currentDate.getDate() + 1);
            }
    
            filteredDates.forEach(function (date) {
                var amount1 = orders
                    .filter(order => new Date(order.created_at).toISOString().split('T')[0] === date && order.payment_method === 1)
                    .reduce((sum, order) => sum + parseFloat(order.amount), 0);
    
                var amount2 = orders
                    .filter(order => new Date(order.created_at).toISOString().split('T')[0] === date && order.payment_method === 2)
                    .reduce((sum, order) => sum + parseFloat(order.amount), 0);
    
                var totalAmount = orders
                    .filter(order => new Date(order.created_at).toISOString().split('T')[0] === date)
                    .reduce((sum, order) => sum + parseFloat(order.amount), 0);
                
                cashSum += amount1;
                tngSum += amount2;
                totalSum += totalAmount;
                
                var row = `
                    <tr>
                        <td><a href="{{ url('admin/allBills_date') }}/${date}" style="text-decoration: none;" class="text-cent">${date}</a></td>
                        <td>RM ${amount1.toFixed(2)}</td>
                        <td>RM ${amount2.toFixed(2)}</td>
                        <td>RM ${totalAmount.toFixed(2)}</td>
                    </tr>
                `;
    
                $dateBody.append(row);
            });
            
            var sumRow = `
                <tr>
                    <td><b>Total:</b></td>
                    <td><b>RM ${cashSum.toFixed(2)}</b></td>
                    <td><b>RM ${tngSum.toFixed(2)}</b></td>
                    <td><b>RM ${totalSum.toFixed(2)}</b></td>
                </tr>
            `;
            
            $dateBody.append(sumRow);
        }

        filterTable();
    });
</script>

@endsection