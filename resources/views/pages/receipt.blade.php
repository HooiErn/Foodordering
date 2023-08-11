<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
       <style>
        @page {
            size: 72mm 100%; /* Adjusted paper size */
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0; /* Adjusted padding to remove extra space */
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 5mm; /* Add margin to center the heading */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5mm; /* Add margin to move the table down */
        }
        th, td {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        th {
            text-align: left;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Receipt</h1>
    <p>Order ID: {{ $order->orderID }}</p>
    
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr>
                <td>{{ $cart->name }}</td>
                <td>{{ $cart->quantity }}</td>
             <td class="addon">
                            @if(!empty($cart->addon))
                                @php
                                    $addons = json_decode($cart->addon, true);
                                @endphp
                                <ul style="list-style-type: disc; padding-left: 10px;">
                                    @foreach($addons as $title => $addon)
                                        @if($addon !== null)
                                            <li style="font-size:9px;">{{$addon}}</li>
                                        @endif
                                    @endforeach
                                </ul>   
                            @endif
                        </td>
                <td>{{ $cart->quantity * $cart->price }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total">
                <td colspan="2">Total:</td>
                <td colspan="2">{{ $order -> amount }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
