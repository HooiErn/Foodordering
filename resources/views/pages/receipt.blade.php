<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Receipt</title>
    </head>
    <body>
        <center>
        <div class="ticket">
            <p class="centered">RECEIPT
           
            <table>
                <thead>
                    <tr>
                        <th class="quantity"></th>
                        <th class="description">Description</th>
                        <th class="price">RM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">Salad</td>
                        <td class="price">RM5.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">2.00</td>
                        <td class="description">Milo</td>
                        <td class="price">RM3.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">Mi Goreng</td>
                        <td class="price">RM10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">RM17.00</td>
                    </tr>   
                </tbody>
            </table>
            </center>
            <p class="centered">Thanks for your purchase!
        </div>
        <div class="centered"> 
        ! qrcode here!
        </div><br>
        <!-- <a href="my.bluetoothprint.scheme:// www.foodorder.ctosweb.com/print">Print</a> -->
        <button id="btnPrint" class="hidden-print" style="float:right">Print</button>
        <script src="{{ asset('js/script.js') }}"></script>
        
    </body>
</html>