
@extends('layout')
@section('content')
<script>

</script>
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-right ml-5">
          <div class="col-md-10">
          @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
            <br>
            <div class="column" style=" float: left; width: 20%;">
             <h5>Create Agents</h5>
                 <form method="POST" action="#">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="account_id">Account id:</label>
                        <input type="number" class="form-control" placeholder="Account ID" id="account_id" name="account_id"  required autofocus>
                        @if ($errors->has('account_id'))
                                      <span class="text-danger">{{ $errors->first('account_id') }}</span>
                                  @endif
                    </div>

                    <div class="form-group">
                        <label for="join_date">Join Date:</label>
                        <input type="date" class="form-control" id="join_date" name="join_date"  value="{{ date('Y-m-d H:i:s') }}" "
                         required>
                    </div> 

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  required autofocus>
                        @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                    </div>




                    </div>
        <!--Column 2-->
                <div class="column" style=" float: left;width: 20%;margin-left:100px; padding-top:32px;">
                <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter User Name" id="username" name="username"  required autofocus>
                        @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                    </div>

                <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"placeholder="Email" id="email" name="email" required autofocus>
                        @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                    </div>

                <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890/123-45678901</p>
                        @if ($errors->has('handphone_number'))
                                      <span class="text-danger">{{ $errors->first('handphone_number') }}</span>
                       @endif
                    </div>  

                 
</div>
<div class="column" style=" float: left;width: 20%;margin-left:100px; padding-top:32px;">
                    <div class="form-group">
                        <label for="ic">IC No.:</label>
                        <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  required autofocus>
                    </div>  
                    
                    <div class="form-group" >
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                        @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                    </div>

                    <div class="form-group" style="text-align:center;"><br>
                        <button  type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                    </div>
</div>
                </form>
</div>
</div>
</div>
  </div>
</main>


@endsection