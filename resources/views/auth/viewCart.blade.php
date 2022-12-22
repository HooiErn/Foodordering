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
                     <td> <a href="/viewCart" class="btn btn-primary" onclick="return confirm('Are you sure you want to place order now?')">Place Order</a> </td>
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




    </div>
    
    </form>
          
    </div>
</div>
   
</body>
</html>