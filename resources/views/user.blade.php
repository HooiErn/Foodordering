<div id="reader" width="600px"></div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        //Code
        window.location.href = decodedText;
    }

    function onScanFailure(error) {

        //
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: {width: 350, height: 350} }, false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    
</script>