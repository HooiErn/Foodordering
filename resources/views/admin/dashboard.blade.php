@extends('layout')

@section('content')
<style>
    .content{
        margin:15px;
    }
    table th{
        width:20%;
        background-color:#ffd699;
    }
    .number{
        background-color: #ffebcd;
    }
    .category{
        background-color: #ffebcd;
    }
    .action{
        background-color: #fff4e3;  
    }
</style>                .

        <div class="content">
            
            <h3 style="margin-top:5px;display:inline;">Category</h3>         
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right;">
                Create
                </button>

                <!-- Modal -->
                <div class="modal fade"  class="btn" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    <!Doctype html>
                <html>
                    <head>
                        <title>Add Category</title>
                        @if(!Session::has('adminData'))
                            <script type="text/javascript">
                                window.location.href="{{url('admin/login')}}"
                            </script>
                        @endif
                    </head>
                    <body>
                        <div class="container">
                            <form action="{{ route('category.add') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                                &nbsp;
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="text-danger">{{$error}}</p>
                                    @endforeach
                                @endif
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" position="float:right;">Close</button>
                            </form>
                        </div>
                    </body>
                </html>
                    </div>
                    </div>
                </div>
                </div>
    <!-- Table -->
            <table class="table-bordered" style="margin-top:20px;"> 
                <colgroup>
                    <col class="number" />
                    <col class="category" />
                    <col class="action" span="3" />
                </colgroup>
                    <tr>
                        <th style="width:5%;">No. </th>
                        <th>Category </th>
                        <th>Function</th>
                    </tr>
                     @foreach($categories as $category)
                    <tr> 
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category -> name}}</td>
                        <td style="white-space: nowrap;">
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2" >
 Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!Doctype html>
<html>
    <head>
        <title>Edit Category</title>
        @if(!Session::has('adminData'))
            <script type="text/javascript">
                window.location.href="{{url('admin/login')}}"
            </script>
        @endif
    </head>
    <body>
        <div class="container">
            <form action="{{ route('category.update') }}" method="POST">
                @csrf

              
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                        <input type="hidden" class="form-control" id="categoryID" name="categoryID" value="{{$category->id}}">
                    </div>
         
                
                <button class="btn btn-primary" type="submit">Submit</button>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                @endif
                &nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
        </div>
    </body>
</html>
      </div>
    </div>
  </div>
</div>
                            <a href="{{ route('delete.category',['id'=>$category->id]) }}" onClick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr> 
                     @endforeach
                </table>
          <!-- Table -->
        </div>
@endsection