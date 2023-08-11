@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Stock 库存</h1>
    <div>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addStock">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Add Stock 添加库存
        </a>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#removeStock">
            <i class="fas fa-minus fa-sm text-white-50"></i>
            Remove Stock 移除库存
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-2">
        <input type="text" class="form-control form-control-inline" id="foodSearch" placeholder="Search Food">
    </div>
</div>

<div class="row">
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                    <tr class="food-row">
                        <td><a href="{{ url('admin/stock-info', ['id' => $food->id]) }}" style="text-decoration: none;">{{ $food->name }}</a></td>
                        <td>
                            @if($food->stock !== null && $food->stock >= 0)
                                {{ $food->stock }}
                            @else
                                Unlimited
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Add Stock Modal -->
<form action="{{ url('admin/addStock') }}" method="POST">
    @csrf
    <div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="addStockTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStockTitle">Add Stock 添加库存</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 mb-4">
                        <label for="foodSearch">Select Food</label>
                        <input type="text" class="form-control form-control-inline" id="foodSearch1" list="foodList1" placeholder="Search Food">
                        <input type="hidden" id="foodId1" name="food_id">
                    
                        <datalist id="foodList1">
                            @foreach($foods->filter(function($food) { return $food->stock !== null; }) as $food)
                                <option value="{{$food->name}}" data-id="{{$food->id}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control form-control-inline" min="0" step="0" name="quantity">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Confirm 确认</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Remove Stock Modal -->
<form action="{{ url('admin/removeStock') }}" method="POST">
    @csrf
    <div class="modal fade" id="removeStock" tabindex="-1" role="dialog" aria-labelledby="removeStockTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeStockTitle">Remove Stock 移除库存</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 mb-4">
                        <label for="foodSearch">Select Food</label>
                        <input type="text" class="form-control form-control-inline" id="foodSearch2" list="foodList2" placeholder="Search Food">
                        <input type="hidden" id="foodId2" name="food_id">
                        <p id="currentStock">Current Stock Left: N/A</p>
                    
                        <datalist id="foodList2">
                            @foreach($foods->filter(function($food) { return $food->stock !== null; }) as $food)
                                <option value="{{$food->name}}" data-id="{{$food->id}}" data-stock="{{$food->stock}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control form-control-inline" min="0" step="0" name="quantity" id="quantityInput">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Confirm 确认</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const foodSearch1 = document.getElementById('foodSearch1');
    const foodIdInput1 = document.getElementById('foodId1');

    foodSearch1.addEventListener('input', function() {
        const searchValue = foodSearch1.value.trim().toLowerCase();
        const options = document.querySelectorAll('#foodList1 option');

        for (const option of options) {
            const foodName = option.value.trim().toLowerCase();

            if (foodName === searchValue) {
                // Set the hidden input's value to the corresponding food ID
                foodIdInput1.value = option.getAttribute('data-id');
                break;
            }
        }
    });

    const quantityInput = document.getElementById('quantityInput');
    const currentStockElement = document.getElementById('currentStock');
    const foodSearch = document.getElementById('foodSearch2');
    const foodIdInput = document.getElementById('foodId2');
    const foodList = document.getElementById('foodList2').getElementsByTagName('option');

    foodSearch.addEventListener('input', function() {
        const searchValue = foodSearch.value.trim().toLowerCase();

        for (const option of foodList) {
            const foodName = option.value.trim().toLowerCase();

            if (foodName === searchValue) {
                // Set the hidden input's value to the corresponding food ID
                foodIdInput.value = option.getAttribute('data-id');
                const currentStock = option.getAttribute('data-stock');
                currentStockElement.textContent = 'Current Stock Left: ' + currentStock;
                break;
            } else {
                // If the food is not found, reset the current stock
                foodIdInput.value = '';
                currentStockElement.textContent = 'Current Stock Left: N/A';
            }
        }
    });
    
    // Get the current stock from the selected option when the foodSearch value changes
    document.getElementById('foodSearch2').addEventListener('input', function() {
        const selectedOption = document.querySelector('#foodList2 option[value="' + this.value + '"]');
        if (selectedOption) {
            const currentStock = selectedOption.getAttribute('data-stock');
            currentStockElement.textContent = 'Current Stock Left: ' + currentStock;
            quantityInput.max = currentStock;
        } else {
            currentStockElement.textContent = 'Current Stock Left: N/A';
            quantityInput.max = 0;
        }
    });

    // Validate the quantity input against the current stock
    quantityInput.addEventListener('change', function() {
        const currentStock = parseInt(quantityInput.max);
        const enteredQuantity = parseInt(quantityInput.value);

        if (enteredQuantity > currentStock) {
            quantityInput.value = currentStock;
        }
    });
</script>

<script>
    const foodSearch = document.getElementById('foodSearch');
    const foodRows = document.querySelectorAll('.food-row');

    foodSearch.addEventListener('input', function () {
        const searchValue = foodSearch.value.trim().toLowerCase();

        foodRows.forEach(row => {
            const foodName = row.querySelector('td:first-child').textContent.trim().toLowerCase();
            const displayStyle = foodName.includes(searchValue) ? 'table-row' : 'none';
            row.style.display = displayStyle;
        });
    });
</script>

@endsection