<!-- Styles -->
<script src="https://kit.fontawesome.com/0ea31885d1.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link rel="stylesheet" href="path/to/fontawesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <title>MY Cart</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function cal(){
        var names=document.getElementsByName('subtotal[]');
        var subtotal=0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2);
       
    }
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
    $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
    var $input = $(el);
    if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
    }
    });
    if (!$form.data('cc-on-file')) {
    e.preventDefault();
    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
    Stripe.createToken({
    number: $('.card-number').val(),
    cvc: $('.card-cvc').val(),
    exp_month: $('.card-expiry-month').val(),
    exp_year: $('.card-expiry-year').val()
    }, stripeResponseHandler);
    }
    });
    function stripeResponseHandler(status, response) {
    if (response.error) {
    $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
    /* token contains id, last4, and card type */
    var token = response['id'];
    $form.find('input[type=text]').empty();
    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    $form.get(0).submit();
    }
    }
    });
    </script>

<style>
    .top-left{
        position: absolute;
        top: 8px;
        left: 16px;
    }

    .bottom-right{
        position: absolute;
        bottom: 13px;
        right: 16px;
    }

    table.tb { border-collapse: collapse; width:300px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue;}
   td { background-color: lightblue;}

  table.tb {
  width: 80%;
}

table, td, th {
  border: 6px solid black;
}
</style>

<body>
    <div class="container">
        <div class="profile">
            <div class="top-icon">
                <div>
                   <a href="menu"><i class="fas fa-arrow-left" style="color:white;font-size:24px;" ></i></a> 
                </div>
                <div>
                    <h4>My Cart</h4>
                </div>
                <div>
                    
                </div>
            </div>
            <br>
            
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <table class="tb">
                <tr>
                    <th>&nbsp;</th>
                    <th>No. </th>
                    <th><center>Name</center></th>
                    <th><center>Image</center></th>
                    <th><center>Quantity</center></th>
                    <th><center>Subtotal</center> </th>
                    <th></th>
                </tr>
                @foreach($carts as $cart)
                <form action="{{ route('payment.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"> 
                    @csrf
                    <tr>
                        <td><center><input type="checkbox" class="checkmark" name="cid[]" id="cid[]" value="{{$cart->cid}}" onclick="cal()">&nbsp;&nbsp;<input type="hidden" name="subtotal[]" id="subtotal[]" value="{{$cart->price*$cart->cartQTY}}"></center></td>
                        <td><center>{{$loop -> iteration}}.</center></td>
                        <td style="width: 30%;">{{$cart -> name}}</td>
                        <td><img src="{{asset('images/')}}/{{$cart->image}}" alt="" width="100" class="img-fluid"></td>
                        <th><center>{{$cart -> cartQTY}}</center></th>
                        <th>RM {{number_format((float)$cart -> price*$cart->cartQTY, 2, '.', '')}}</th>
                        <th><a href="{{ route('delete.cart.food',['id'=>$cart->cid]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete it?')">Delete</a></th>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="height:20px;"> <h5 style="float:right;">TOTAL: RM</h5></td>
                    <td><input type="text" name="sub" id="sub" value="0" size="8" readonly style="user-select: none;"/></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    </div>
    <div class="col-sm-2"></div>
</div>

<br><br><br>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10"> 
        <div class="row">        
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                <div class="panel-heading" >
                    <div class="row">
                    &nbsp; &nbsp;<h3>Card Payment</h3>                    
                    </div>
                </div>
                <div class="panel-body">                
                    <br>                
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-6 form-group required'>
                            <label class='control-label'>Name on Card</label> 
                            <input class='form-control' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group required'>
                            <label class='control-label'>Card Number</label> 
                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>                           
                        </div>                        
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> 
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> 
                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> 
                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                    {{-- <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.
                            </div>
                        </div>
                    </div> --}}
                        <div class="form-row row">
                            <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                            
                        </div>
                    <br><br>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
    
    </form>
          
    </div>
</div>
   
</body>
</html>