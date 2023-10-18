@extends('layouts.admin')
@section('content')

<style>
    ul.arrow-list {
        list-style-type: none;
        padding-left: 20px;
    }

    ul.arrow-list li::before {
        content: '\2192';
        padding-right: 10px;
    }
    
    .password-input-container {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        cursor: pointer;
        transform: translateY(-50%);
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Members 会员</h1>
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#memberModal">
        <i class="fas fa-user fa-sm text-white-50"></i>
        Register注册
    </a>
</div>

<div class="card m-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <ul class="m-0 p-0" style="list-style-type: none;">
                    <li><a href="{{ url('admin/member-list', ['id' => Auth::user()->id]) }}" style="text-decoration:none;">{{Auth::user()->name}}</a></li>
                        <ul class="arrow-list">
                        @foreach($members as $member)
                            <li><a href="{{ url('admin/member-list', ['id' => $member -> id]) }}" style="text-decoration:none;">{{$member->name}}</a></li>
                        @endforeach
                    </ul>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 font-weight-bold text-uppercase h5"></div>
                </div>
                <form action="{{ url('admin/edit-member') }}" method="POST">
                    @csrf
                    <input type="hidden" class="form-control form-control-line" value="{{$detail -> id}}" name="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-line" name="name" value="{{$detail -> name}}">
                            </div>
                            <div class="col-sm-4">
                                <label for="password">Change Password</label>
                                <div class="password-input-container">
                                    <input type="password" class="form-control form-control-line" name="password" valye="{{$detail -> password}}">
                                    <span class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="created_date">Created Date</label>
                                <input type="text" class="form-control form-control-line" name="created_date" value="{{$detail -> created_at}}" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit 更改</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Member Modal -->
<form action="{{ url('admin/registerMember') }}" method="POST">
    @csrf
    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalTitle">Register Member 添加会员</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="m_name">Member Name 会员名字</label>
                        <input type="text" class="form-control form-control-inline" name="m_name">
                    </div>
                    <div class="col-md-12">
                        <label for="m_password">Password 密码</label>
                        <input type="password" class="form-control form-control-inline" name="m_password">
                    </div>
                    <div class="col-md-12">
                        <label for="m_confirm_password">Confirm Password 确认密码</label>
                        <input type="password" class="form-control form-control-inline" name="m_confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-2">Register 注册</button>
                </div>
            </div>
        </div>
    </div>
</form>
@if($errors -> has('m_name') || $errors -> has('m_password') || $errors->has('m_confirm_password'))
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#memberModal').modal('show');
        });
    </script>
@endif

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.querySelector('input[name="password"]');
        const toggleButton = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.innerHTML = '&#128064;'; // Show open-eye icon
        } else {
            passwordInput.type = 'password';
            toggleButton.innerHTML = '&#128065;'; // Show closed-eye icon
        }
    }
</script>

@endsection