@extends('layouts.admin')
@section('content')

<title>Touch n Go Setup</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Touch n Go Setup</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm uploadBtn" onclick="upload()">
        <i class="fa fa-upload fa-sm text-white-50"></i>
        Upload Qr Code
    </a>
</div>

    <form action="{{ url('admin/addQrCode') }}" method="POST" enctype="multipart/form-data">
        <input type="file" id="my_file" style="display: none;" class="form-control"/>
        <button type="submit" class="btn btn-success confirmBtn">Confirm</button>
    </form>

<div class="row">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <td></td>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("button[type='submit']").hide();
         
        var file = document.getElementById("my_file");
        if(file.files.length == 0 ){
            $("button[type='submit']").hide();
            $(".uploadBtn").show();
        }
        else if(file.files.length == 1 ){
            $("button[type='submit']").show();
            $(".uploadBtn").hide();
        }
    })
</script>
<script>
    function upload(){
        $("input[id='my_file']").click();
    }
</script>

@endsection