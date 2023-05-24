@extends('layouts.admin')
@section('content')

<title>Sub Account && Action List</title>

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Sub Account List</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addSubAcc">
        <i class="fas fa-user fa-sm text-white-50"></i>
        Create Sub Account
    </a>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border border-dark shadow">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style="background-color: #f0f0f0; font-weight: bold;">No.</td>
                            <td style="background-color: #f0f0f0; font-weight: bold;">Name</td>
                            <td style="background-color: #f0f0f0; font-weight: bold; cursor:pointer;">Created Date</td>
                            <td style="background-color: #f0f0f0; font-weight: bold;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins ->where('id', '!=' , Auth::user()->id) as $admin)
                            <tr>
                                <td>{{$loop -> iteration}}</td>
                                <td>{{$admin -> name}}</td>
                                <td>{{date('Y-m-d', strtotime($admin -> created_at))}}</td>
                                <td><a class="btn btn-danger" href="{{ url('admin/deleteSubAccount', ['id' => $admin -> id]) }}" onclick="return confirm('Are you sure to delete this sub account?')"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Sub Account Modal -->
<div class="modal fade" id="addSubAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Sub Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/addSubAccount') }}" method="POST">
                    @csrf
                    <div class="form-floating ml-2 mr-2 mb-2">
                        <labe for="name">Name</labe>
                        <input type="string" name="name" class="form-control form-control-line" placeholder="Enter Name" value="{{ old('name')}}" required>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-floating m-2">
                        <labe for="password">Password</labe>
                        <input type="password" name="password" class="form-control form-control-line" placeholder="Enter Password" required>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-floating m-2">
                        <labe for="confirm_password">Confirm Password</labe>
                        <input type="password" name="confirm_password" class="form-control form-control-line" placeholder="Enter Confirm Password" required>
                        @error('confirm_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-primary m-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if($errors -> has('name') || $errors -> has('password') || $errors -> has('confirm_password'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#addSubAcc').modal('toggle')
        });
    </script>
@endif

@if(count($actions))
<div class="d-sm-flex align-items-center justify-content-between mt-3 mb-2">
    <h1 class="h3 mb-0 text-gray-800">Action List</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border border-dark shadow">
            <div class="table-responsive">
                <table id="mylists" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="background-color: #f0f0f0; font-weight: bold;">Name</th>
                            <th style="background-color: #f0f0f0; font-weight: bold;">Action</th>
                            <th onclick="sortTable(2)" style="background-color: #f0f0f0; font-weight: bold;cursor:pointer;">Date</th>
                            <th style="background-color: #f0f0f0; font-weight: bold;">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actions as $action)
                            <tr>
                                <td>{{$action->name}}</td>
                                <td>{{$action->action}}</td>
                                <td>{{date('Y-m-d', strtotime($action->created_at))}}</td>
                                <td>{{date('H:i:s', strtotime($action->created_at))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("mylists");
        switching = true;
        dir = "asc";
        
        while (switching) {
            switching = false;
            rows = table.rows;
            
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
@endsection