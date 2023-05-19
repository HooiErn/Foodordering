<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title itemprop="name">Last Order</title>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
    </head>
    <body>
        <div id="snippetContent">
            <div id="orderCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($orderData as $index => $data)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <table class="body-wrap">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="container" width="600">
                                            <div class="content">
                                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="content-wrap aligncenter">
                                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="content-block">
                                                                                @php
                                                                                    $numberWords = ['One', 'Second', 'Third', 'Fourth', 'Fifth']; // Add more values as needed
                                                                                    $index = $loop->index;
                                                                                    $numberWord = isset($numberWords[$index]) ? $numberWords[$index] : ($index + 1) . 'th';
                                                                                @endphp
                                                                                <h2>Last {{ $numberWord }} Order</h2>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="content-block">
                                                                                <table class="invoice">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Table {{ $data['order']->table_id }}<br>
                                                                                                Order ID #{{ $data['order']->orderID }}<br>
                                                                                                {{ \Carbon\Carbon::parse($data['order']->created_at)->format(' j  F  Y , g:i a') }}<br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                                    <!-- Display carts -->
                                                                                                    @foreach($data['carts'] as $cart)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                {{ $cart->name }} <span class="text-info">x{{ $cart->quantity }}</span>
                                                                                                                <!-- Display addons if available -->
                                                                                                                @if(!empty($cart->addon))
                                                                                                                    @php
                                                                                                                        $addons = json_decode($cart->addon, true);
                                                                                                                    @endphp
                                                                                                                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                                                                                                                        @foreach($addons as $title => $addon)
                                                                                                                            @if($addon !== null)
                                                                                                                                <li>{{ $title }} - {{ $addon }}</li>
                                                                                                                            @endif
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                @endif
                                                                                                            </td>
                                                                                                            <td class="alignright">RM {{ number_format($cart->price * $cart->quantity, 2) }}</td>
                                                                                                        </tr>
                                                                                                    @endforeach
        
                                                                                                    <!-- Display waiter_carts -->
                                                                                                    @foreach($data['waiterCarts'] as $cart)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                {{ $cart->name }} <span class="text-info">x{{ $cart->quantity }}</span>
                                                                                                                <!-- Display addons if available -->
                                                                                                                @if(!empty($cart->addon))
                                                                                                                @php
                                                                                                                $addons = json_decode($cart->addon, true);
                                                                                                                @endphp
                                                                                                                                 <ul style="list-style-type: none; margin: 0; padding: 0;">
                                                                                                                    @foreach($addons as $title => $addon)
                                                                                                                    @if($addon !== null)
                                                                                                                    <li>{{ $title }} - {{ $addon }}</li>
                                                                                                                    @endif
                                                                                                                    @endforeach
                                                                                                                </ul>
                                                                                                                @endif
                                                                                                            </td>
                                                                                                            <td class="alignright">RM {{ number_format($cart->price * $cart->quantity, 2) }}</td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                    <tr class="total">
                                                                                                        <td class="alignright" width="80%">Total:</td>
                                                                                                        <td class="alignright">RM {{ number_format($data['order']->amount, 2) }}</td>
                                                                                                    </tr>
                                                                                                    <tr class="pay_by">
                                                                                                        <td>Pay By: </td>
                                                                                                        <td class="alignright">{{ $data['order']->payment_method == 1 ? 'Cash' : 'Touch n Go' }}</td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                
                    <a class="carousel-control-prev" href="#orderCarousel" role="button" data-slide="prev" id="btnPrevious">
                        <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#orderCarousel" role="button" data-slide="next" id="btnNext">
                        <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    
                    <div class="text-center mb-2">
                        <a href="{{ url('home',['id' => $data['order']->table_id]) }}" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                var orderCarousel = $("#orderCarousel");
                var carouselItems = orderCarousel.find(".carousel-item");
                var currentSlide = 0;
        
                function showSlide(slideIndex) {
                    carouselItems.removeClass("active");
                    carouselItems.eq(slideIndex).addClass("active");
                }
        
                $("#btnNext").click(function() {
                    currentSlide++;
                    if (currentSlide >= carouselItems.length) {
                        currentSlide = 0;
                    }
                    showSlide(currentSlide);
                });
        
                $("#btnPrevious").click(function() {
                    currentSlide--;
                    if (currentSlide < 0) {
                        currentSlide = carouselItems.length - 1;
                    }
                    showSlide(currentSlide);
                });
            });
        </script>
            
        <style type="text/css">/*<![CDATA[*//* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    font-size: 14px;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    padding: 0 0 20px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer {
    width: 100%;
    clear: both;
    color: #999;
    padding: 20px;
}
.footer a {
    color: #999;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
}/*]]>*/</style>
    </body>
</html>