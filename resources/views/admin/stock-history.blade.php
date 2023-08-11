@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">History 历史</h1>
</div>

<form action="{{ route('admin.stockHistory.searchDate') }}" method="POST">
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
            <a href="{{ url('admin/stock-history') }}" class="btn btn-danger btn-sm ml-2 text-white" onclick="clearLocalStorage()" style="text-decoration: none;">Default</a>
        </div>
    </div>
</form>

<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_histories as $stock_history)
                    @if($stock_history->food) <!-- Check if food is not null -->
                        <tr>
                            <td>{{ $stock_history->food->name }}</td>
                            <td>
                                @if($stock_history->action == 1) 
                                    <span class="text-success">Add {{ $stock_history->quantity }} <i class="fas fa-arrow-up fa-sm"></i></span>
                                @elseif($stock_history->action == 2)
                                    <span class="text-danger">Remove {{ $stock_history->quantity }} <i class="fas fa-arrow-down fa-sm"></i></span>
                                @elseif($stock_history->action == 3)
                                    <span class="text-danger">Sell {{ $stock_history->quantity }} <i class="fas fa-shopping-cart fa-sm"></i></span>
                                @endif
                            </td>
                            <td>{{ $stock_history->created_at }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function clearLocalStorage() {
        localStorage.removeItem("fromDate-stock");
        localStorage.removeItem("toDate-stock");
    }

    $(document).ready(function() {
        // Get the default dates from localStorage or set them to today's date
        var fromDate = localStorage.getItem("fromDate-stock") || new Date().toISOString().split('T')[0];
        var toDate = localStorage.getItem("toDate-stock") || new Date().toISOString().split('T')[0];
    
        // Set the values of the input fields
        $('input[name=from]').val(fromDate);
        $('input[name=to]').val(toDate);
    
        // Update localStorage when the input values change
        $('input[name=from]').change(function() {
            localStorage.setItem("fromDate-stock", $(this).val());
        });
    
        $('input[name=to]').change(function() {
            localStorage.setItem("toDate-stock", $(this).val());
        });
    });
</script>

@endsection