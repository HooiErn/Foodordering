@extends('layouts.admin')
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@section('content')

<title>Food</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Food</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#categoryModal">Create Category</a>
</div>

<div class="row">
    <div class="col-md-12">
        @foreach($categories as $category)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="5">Category : {{ $category -> name }}</th>
                                <th class="text-end" style="float:right;">
                                    <div>
                                    <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#{{$category -> name}}"><i class="fas fa-plus"></i></a>
                                    <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#{{$category -> name}}{{$category -> id}}"><i class="fas fa-pen" style="color: white;"></i></a>
                                    <a href="{{ url('admin/deleteCategory',['id' => $category -> id]) }}" type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure to delete this category?<br>It will also delete the food related to this category')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Available</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($foods -> where('categoryID', $category -> id) as $food)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td><img src="{{ asset('images') }}/{{$food -> image}}" alt="" width="50px" height="50px"></td>
                                    <td>{{ $food -> name }}</td>
                                    <td>{{ number_format($food -> price,2) }}</td>
                                    <td>{{$food -> available}}</td>
                                    @if($food -> available > 0)
                                        <td>
                                            <a href="{{ url('changeStatus',['id' => $food -> id]) }}" class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                            </a>    
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ url('changeStatus',['id' => $food -> id]) }}" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    @endif
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#food{{$food -> id}}"><i class="fas fa-pen" style="color:blue;"></i></a>
                                    &nbsp; &nbsp;
                                        <a href="{{ url('admin/deleteFood',['id' => $food -> id])}}" onclick="return confirm('Are you sure to delete this food?')"><i class="fas fa-trash" style="color:red;"></i></a>
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
                    <h5 class="modal-title" id="categoryTitle">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-line">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Category Modal -->
@foreach($categories as $category)
    <form action="{{ route('update.category') }}" method="POST" class="form-horizontal form-material">
        @csrf
        <div class="modal fade" id="{{$category -> name}}{{$category -> id}}" tabindex="-1" role="dialog" aria-labelledby="categoryTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryTitle">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control form-control-line" id="catID" name="catID" value="{{$category -> id}}">
                            <label for="categoryName">Category Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-line" value="{{$category -> name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

<!-- Food Modal -->
@foreach($categories as $category)
    <form action="{{ url('admin/addFood') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="{{$category -> name}}" tabindex="-1" role="dialog" aria-labelledby="{{$category -> name}}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$category -> name}}Title">Create Food</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control form-control-line" id="available" name="available" value="1">
                        <div class="form-group">
                            <label for="name">Food Name</label>
                            <input type="text" class="form-control form-control-line" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Food Description</label>
                            <input type="text" class="form-control form-control-line" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input type="number" class="form-control form-control-line" id="price" name="price" step=".01">
                        </div>
                        <div class="form-group">
                            <label for="available">Available</label>
                            <input type="number" class="form-control form-control-line" id="available" name="available" step="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="foodImage">Food Image</label>
                            <input type="file" class="form-control form-control-line" id="foodImage" name="foodImage">
                        </div>
                        <div class="form-group">
                            <label for="categoryID">Food Category</label>
                            <input type="text" class="form-control form-control-line" placeholder="{{$category -> name}}" readonly>
                            <input type="hidden" class="form-control form-control-line" id="categoryID" name="categoryID" value="{{$category -> id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

<!-- Edit Food Modal -->
@foreach($foods as $food)
    <form action="{{ route('update.food') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="food{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$food -> name}}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$food -> name}}Title">Edit Food</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control form-control-line" id="foodID" name="foodID" value="{{$food->id}}">
                        <div class="form-group">
                            <label for="name">Food Name</label>
                            <input type="text" class="form-control form-control-line" id="name" name="name" value="{{$food -> name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Food Description</label>
                            <input type="text" class="form-control form-control-line" id="description" name="description" value="{{$food -> description}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input type="number" class="form-control form-control-line" id="price" name="price" step=".01" value="{{$food -> price}}">
                        </div>
                        <div class="form-group">
                            <label for="available">Available</label>
                            <input type="number" class="form-control form-control-line" id="available" name="available" step="0" min="0" value="{{$food->available}}">
                        </div>
                        <div class="form-group">
                            <label for="foodImage">Food Image</label>
                            <input type="file" class="form-control form-control-line" id="foodImage" name="foodImage" src="{{ asset('images')}}/{{$food -> image}}">
                        </div>
                        <div class="form-group">
                            @foreach($categories -> where('id', $food -> categoryID) as $category)
                                <input type="text" name="categoryID" id="oldCategory" class="form-control form-control-line" value="{{$category -> name}}" readonly>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

@endsection