@extends('layouts.admin')
@section('content')

<title>Touch n Go Setup</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Touch n Go Setup 线上付款设置</h1>
    @if(!$qrcodes)
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#qrdetail">
            <i class="fa fa-upload fa-sm text-white-50"></i>
            Upload Qr Code 上传二维码
        </a>
    @else
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#updateQr">
            <i class="fa fa-upload fa-sm text-white-50"></i>
            Edit Qr Code 修改二维码
        </a>
    @endif
</div>

<div class="row">
    @foreach($qrcodes as $qrcode)
    <div class="card">
        <div class="card-header" id="heading_one" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">{{$qrcode -> name}}</h5>
        </div>
        <div id="collapse" class="collapse" aria-labelledby="heading_one">
            <div class="card-body">
                <img src="{{ asset('images/')}}/{{$qrcode -> qrcode}}" width="200">
            </div>
        </div>
    </div>
    @endforeach
</div>

    
<!-- Add Qr Code -->
<form action="{{ url('admin/addQrcode') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="qrdetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Qr Detail 二维码资料</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img id="output" width="200" />
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Qr Code Name 二维码名字</label>
                                        <input class="form-control form-control-line" name="name" id="name" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Qr Code Image 二维码图片</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input form-control" id="validatedCustomFile" name="qrcode" id="qrcode" type="file" onchange="loadFile(event)" accept="image/*">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file 选择图片</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close 关闭</button>
                    <button type="submit" class="btn btn-primary">Confirm 确定</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile2 = function(event) {
	var image2 = document.getElementById('output2');
	image2.src = URL.createObjectURL(event.target.files[0]);
};
</script>

@endsection