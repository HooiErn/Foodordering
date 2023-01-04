<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table>
                <tr>
                    <th>&nbsp;</th>
                    <th>No. </th>
                    <th>Name </th>
                    <th>Image </th>
                    <th>Quantity </th>
                    <th>Subtotal</th>
                </tr>
                @foreach($carts as $cart)
                <form action="{{ route('payment.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"> 
                    @csrf
                    <tr>
                        <td><input type="checkbox" name="cid[]" id="cid[]" value="{{$cart->cid}}" onclick="cal()">&nbsp;&nbsp;<input type="hidden" name="subtotal[]" id="subtotal[]" value="{{$cart->price*$cart->cartQTY}}"></td>
                        <td></td>
                        <td>{{$cart -> name}}</td>
                        <td><img src="{{asset('images/')}}/{{$cart->image}}" alt="" width="100" class="img-fluid"></td>
                        <th>{{$cart -> cartQTY}}</th>
                        <th>RM {{$cart->price*$cart->cartQTY}}</th>
                        <th><a href="#" class="btn btn-danger btn-xs" onClick="return confirm('Are you confirm to delete?')">Delete</a></th>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">&nbsp;</td>
                    <td><input type="text" name="sub" id="sub" value="0" size="7" readoly style="user-select: none;"/></td>
                    <td>&nbsp;</td>
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

<div class="paymentMethod">
        Card<input type="radio" name="card" id="card" value="card">
        Wallet<input type="radio" name="wallet" id="wallet" value="wallet">
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10"> 
        <div class="row" id="wallet-payment" style="display: none;">
            <h3>Wallet Payment</h3>
        </div>
        <div class="row" id="card-payment" style="display: none;">        
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                <div class="panel-heading" >
                    <div class="row">
                        <h3>Card Payment</h3>                    
                    </div>
                </div>
                <div class="panel-body">                              
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
<script>
    $("input[type='radio']").change(function(){
   
   if($(this).val()=="card")
   {
       $("#card-payment").show();
       $("#wallet-payment").hide();
       document.getElementById('wallet').checked = false;
   }
   else if($(this).val()=="wallet")
   {
        $("#card-payment").hide();
       $("#wallet-payment").show();
       document.getElementById('card').checked = false;
   }
   else{
        $("#card-payment").hide();
       $("#wallet-payment").hide();
       document.getElementById('wallet').checked = false;
       document.getElementById('card').checked = false;
   }
       
   });
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
    </div>
    
    </form>