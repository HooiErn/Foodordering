@extends('layouts.admin')
@section('content')

<title>Food</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Food 食物</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#categoryModal">Create Category添加种类</a>
</div>

<div class="row">
    <div class="col-md-12">
        @foreach($categories as $category)
            <div class="card">
                <div class="table-responsive border border-dark">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4">Category 种类 : {{ $category -> name }}</th>
                                <th class="text-end">
                                    <div>
                                    <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addFood{{$category -> id}}"><i class="fas fa-plus text-white"></i></a>
                                    <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#editCategory{{$category -> id}}"><i class="fas fa-pen text-white"></i></a>
                                    <a href="{{ url('admin/deleteCategory',['id' => $category -> id]) }}" type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure to delete this category? It will also delete the food related to this category 您确定要删除该种类吗? 这样会将该种类里面的食物全部都删除')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Image 图片</th>
                                <th>Name 名字</th>
                                <th>Price 价钱</th>
                                <th>Action 行动</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($foods -> where('categoryID', $category -> id) as $food)
                                <tr>
                                    <td>{{ $loop -> iteration }}.</td>
                                    <td><img src="{{ asset('images') }}/{{$food -> image}}" alt="" width="50px" height="50px"></td>
                                    <td>{{ $food -> name }}</td>
                                    <td>{{ number_format($food -> price,2) }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#food{{$food -> id}}"><i class="fas fa-pen"></i></a>
                                        <a href="{{ url('admin/deleteFood',['id' => $food -> id])}}" onclick="return confirm('Are you sure to delete this food? 您确定要删除该食物吗?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        @endforeach
    </div>
</div>

<!-- Category Modal -->
<form action="{{ url('admin/addCategory') }}" method="POST" class="form-horizontal form-material">
    @csrf
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryTitle">Create Category 添加种类</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="c_name">Category Name 种类名字</label>
                        <input type="text" id="c_name" name="c_name" class="form-control form-control-line @error('c_name') is-invalid @enderror" value="{{ old('c_name') }}" required>
                        @error('c_name')
                            @if($message == "The c name has already been taken.")
                                <span class="text-danger">Duplicate name is used.</span>
                            @else
                                <span class="text-danger">{{$message}}</span>
                            @endif
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create 添加</button>
                </div>
            </div>
        </div>
    </div>
</form>
@if($errors -> has('c_name'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#categoryModal').modal('toggle')
        });
    </script>
@endif

<!-- Edit Category Modal -->
@foreach($categories as $category)
    <form action="{{ url('admin/updateCategory') }}" method="POST" class="form-horizontal form-material">
        @csrf
        <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="categoryTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryTitle">Edit Category 修改种类</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-line" id="catID" name="catID" value="{{$category->id}}">
                            <label for="name">Category Name 种类名字</label>
                            <input type="text" id="name" name="name" class="form-control form-control-line @error('edit_c_name.'.$category->id) is-invalid @enderror" placeholder="{{$category->name}}" value="{{ old('edit_c_name.'.$category->id) }}">
                            @error('edit_c_name.'.$category->id)
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save 保存</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
@if ($errors->has('edit_c_name'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id = {{ old('catID')}};
            $('#editCategory' + id).modal('toggle');
        });
    </script>
@endif


<!-- Food Modal -->
@foreach($categories as $category)
    <form action="{{ url('admin/addFood') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="addFood{{$category -> id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$category -> name}}Title">Create Food 添加食物</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control form-control-line" id="available" name="available" value="1">
                        <div class="form-group">
                            <label for="foodImage">Food Image 食物图片</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foodImage" name="foodImage" onchange="changeFileName(this)" required>
                                <label class="custom-file-label" id="foodImageLabel" for="foodImage">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Food Name 食物名字</label>
                            <input type="text" class="form-control form-control-line" id="name" name="name" value="{{ old('name') }}" required>
                        </div>  
                        <div class="form-group">
                            <label for="price">Food Price 食物价钱</label>
                            <input type="number" class="form-control form-control-line" id="price" name="price" step=".01" required>
                        </div>
                        <div id="select-options-container-{{$category->id}}">
                            <label for="food_select_option">Food Select Option 食物选项</label>
                            
                        </div>
                        <a type="button" class="btn btn-success btn-sm mb-1 text-white add-select-option" id="add-select-option-{{$category->id}}"><i class="fa fa-plus text-white"></i> Add New Option</a>

                        <div class="form-group">
                            <label for="categoryID">Food Category 食物种类</label>
                            <input type="text" class="form-control form-control-line" placeholder="{{$category -> name}}" readonly>
                            <input type="hidden" class="form-control form-control-line" id="categoryID" name="categoryID" value="{{$category -> id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Create 添加</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

<!-- Edit Food Modal -->
@foreach($foods as $food)
    <form action="{{ url('admin/updateFood') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="food{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$food -> name}}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$food -> name}}Title">Edit Food 修改食物</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control form-control-line" id="foodID" name="foodID" value="{{$food->id}}">
                        <input type="hidden" class="form-control form-control-line" id="available" name="available" value="1">
                        <div class="form-group">
                            <label for="foodImage">Food Image 食物照片</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foodImage" name="foodImage" id="foodImage">
                                <label class="custom-file-label" for="foodImage">Choose file 选择照片</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Food Name 食物名字</label>
                            <input type="text" class="form-control form-control-line" id="name" name="name" value="{{$food -> name}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price 食物价钱</label>
                            <input type="number" class="form-control form-control-line" id="price" name="price" step=".01" value="{{$food -> price}}">
                        </div>
                        @if(count($food -> foodSelect))
                            @foreach($food->foodSelect as $index => $foodSelect)
                                <div class="form-group">
                                    <label for="edit_select_name">Food Select Option 食物选项</label>
                                    <input type="text" class="form-control form-control-line" id="edit_select_name[]" name="edit_select_name[]" value="{{$foodSelect->name}}">
                                </div>
                                @foreach($foodSelect->foodOption as $foodOption)
                                    <div class="form-group option-value-container">
                                        <input type="text" name="edit_option[{{$index}}][]" class="form-control form-control-inline" value="{{$foodOption->name}}">
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label for="categoryID">Category 种类</label>
                            <select name="categoryID" id="categoryID" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category -> id}}" @if($food -> categoryID == $category -> id) selected @endif>{{$category -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save 保存</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

@foreach($categories as $category)
    <script>
        $(document).ready(function() {
            var selectOptionsContainer = $('#select-options-container-{{$category->id}}');
            var selectOptionTemplate = `
            <div class="select-options" style="margin-bottom:10px;">
                <div class="form-group">
                    <input type="text" class="form-control select-option-name" name="select_option_name[]" placeholder="Option Name {index}" required>
                </div>
                <div class="option-value-list">
                    <div class="form-group position-relative option-value-container">
                        <input type="text" name="option_value_name[{optionValueIndex}][]" class="form-control form-control-inline option-value" placeholder="Option Value" required>
                        <button type="button" class="btn btn-danger delete-option-value" style="position: absolute; right: 0; top:1%;"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <a type="button" class="btn btn-success btn-sm mb-1 text-white add-option-value" id="add-option-value"><i class="fa fa-plus text-white"></i> Add New Value</a>
                <button type="button" class="btn btn-danger btn-sm mb-1 delete-select-option" style="right: 0; bottom:0;"><i class="fa fa-trash"></i> Delete Option</button>
            </div>
            `;

            var optionValueTemplate = `
            <div class="form-group position-relative option-value-container">
                <input type="text" name="option_value_name[{optionValueIndex}][]" class="form-control form-control-inline option-value" placeholder="Option Value" required>
                <button type="button" class="btn btn-danger delete-option-value" style="position: absolute; right: 0; top:1%;"><i class="fa fa-trash"></i></button>
            </div>
            `;

            var value = 0;

            $('#add-select-option-{{$category->id}}').click(function() {
                var values = {
                    optionValueIndex: value,
                    index: value + 1
                    };

                    var newSelectOption = $(selectOptionTemplate.replace(/\{(\w+)\}/g, function(match, placeholder) {
                    return values[placeholder];
                }));
                var newValue = $(selectOptionTemplate.replace(/\{index\}/g, value+1));
                selectOptionsContainer.append(newSelectOption);
                value++;
            });


            selectOptionsContainer.on('click', '.add-option-value', function() {
                var optionValueList = $(this).closest('.select-options').find('.option-value-list');
                var optionValueContainer = optionValueList.find('.option-value-container').last();
                var optionValueIndex = optionValueContainer.find('input').attr('name').match(/\[(\d+)\]/)[1];
                var newOptionValue = $(optionValueTemplate.replace(/\{optionValueIndex\}/g, optionValueIndex));
                optionValueContainer.after(newOptionValue);
            });

            selectOptionsContainer.on('click', '.delete-option-value', function() {
                var optionValueContainer = $(this).closest('.option-value-container');
                if (optionValueContainer.siblings('.option-value-container').length > 0) {
                    optionValueContainer.remove();
                } else {
                    $(this).closest('.option-value-list').remove();
                }
            });

            selectOptionsContainer.on('click', '.delete-select-option', function() {
                $(this).closest('.select-options').remove();
            });
        });
    </script>


    <script>
        function changeFileName(input) {
            var fileName = input.value.split('\\').pop();
            var label = document.getElementById('foodImageLabel');
            label.innerHTML = fileName;
        }
    </script>

@endforeach

<script>
    $(document).on('click', '.delete-option', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var food_id = $(this).data('food_id');
        var url = '{{ url("admin/deleteSelectOption") }}' + '/' + id;
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                window.location.reload();
                $(document).on('shown.bs.modal', '#food'+food_id, function () {
                    $('#food'+food_id).modal('toggle');
                });
            },
        });
    });
    
    $(document).on('click', '.delete-select', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var food_id = $(this).data('food_id');
        var url = '{{ url("admin/deleteSelect") }}' + '/' + id;
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                window.location.reload();
                $(document).on('shown.bs.modal', '#food'+food_id, function () {
                    $('#food'+food_id).modal('toggle');
                });
            },
        });
    });
</script>

@endsection
