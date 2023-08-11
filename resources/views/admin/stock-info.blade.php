@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/stock') }}" style="text-decoration: none;">Stock List</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $food->name }}</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><a href="#" class="sort" data-column="id" style="text-decoration: none;">ID <i class="fas fa-sort"></i></a></th>
                    <th>History</th>
                    <th><a href="#" class="sort" data-column="created_at" style="text-decoration: none;">Created Date <i class="fas fa-sort"></i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock_history)
                    <tr>
                        <td data-id="{{$stock_history->id}}">{{$stock_history->id}}</td>
                        <td data-amount="{{$stock_history -> quantity}}">
                            @if($stock_history -> action == 1) 
                                <span class="text-success">Add {{$stock_history -> quantity}} <i class="fas fa-arrow-up fa-sm"></i></span>
                            @elseif($stock_history -> action == 2)
                                <span class="text-danger">Remove {{$stock_history -> quantity}} <i class="fas fa-arrow-down fa-sm"></i></span>
                            @elseif($stock_history -> action == 3)
                                <span class="text-danger">Sell {{$stock_history -> quantity}} <i class="fas fa-shopping-cart fa-sm"></i></span>
                            @endif
                        </td>
                        <td data-created_at="{{$stock_history->created_at}}">{{$stock_history -> created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableBody = document.querySelector('tbody');
        const sortLinks = document.querySelectorAll('.sort');

        sortLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const column = this.dataset.column;
                const isAsc = this.classList.contains('asc');

                sortTable(column, isAsc);

                // Toggle sorting direction
                this.classList.toggle('asc', !isAsc);
                this.classList.toggle('desc', isAsc);
            });
        });

        function sortTable(column, isAsc) {
            const rows = Array.from(tableBody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                let aValue, bValue;

                if (column === 'id') {
                    aValue = parseInt(a.querySelector(`td[data-${column}]`).dataset.id);
                    bValue = parseInt(b.querySelector(`td[data-${column}]`).dataset.id);
                } else if (column === 'history') {
                    const aSpan = a.querySelector(`td[data-${column}] span`);
                    const bSpan = b.querySelector(`td[data-${column}] span`);
                    aValue = aSpan ? aSpan.textContent : '';
                    bValue = bSpan ? bSpan.textContent : '';
                } else {
                    aValue = a.querySelector(`td[data-${column}]`).dataset.created_at;
                    bValue = b.querySelector(`td[data-${column}]`).dataset.created_at;
                }

                if (column === 'id') {
                    return isAsc ? aValue - bValue : bValue - aValue;
                } else {
                    return isAsc ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                }
            });

            rows.forEach(row => tableBody.appendChild(row));
        }
    });
</script>

@endsection