@extends('layouts.waiter')
@section('content')

<title>Scan</title>

<div id="reader" width="600px"></div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        //Code
        $(function() {
            $.ajax({
                type: 'get',
                url: '{{URL::to('takeOrder')}}',
                data: {'orderID': decodedText},
                success: function(data) {
                    console.log(data);
                    alert(data);
                }
            });
        });
    }

    function onScanFailure(error) {

        //
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: {width: 350, height: 350} }, false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endsection