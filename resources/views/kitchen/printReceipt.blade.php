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
        <p>Table ID: {{ $order -> table_id }}</p>
        
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Addon</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <th colspan="3">&nbsp;</th>
                    <th>(RM)</th>
                    <th>(RM)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    @if(!empty($cart->addon))
                        <td>
                            @php
                                $addons = json_decode($cart->addon, true);
                            @endphp
                            <ul style="list-style-type: none; margin: 0; padding: 0;">
                                @foreach($addons as $title => $addon)
                                    @if($addon !== null)
                                        <li>{{$addon}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ number_format($cart->price,2) }}</td>
                    <td>{{ number_format($cart->quantity * $cart->price,2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total">
                    <td colspan="3">&nbsp;</td>
                    <td >Total:</td>
                    <td >{{ number_format($order -> amount,2) }}</td>
                </tr>
            </tfoot>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Trigger print after page load
                window.print();
    
                // Close the page after printing
                $(window).on('afterprint', function() {
                    window.close();
                });
            });
        </script>
    </body>
</html>
