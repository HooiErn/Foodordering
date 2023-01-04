<style>
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

h6 {
  text-align: right;
}
</style>


@extends('layouts.admin')
@section('content')
<title>View Order</title>

<div class="row">
    <div class="table-responsive">
        
            <table class="tb">
                
                    <tr>
                        {{$waiter->name}}
            <th>#</th>
            <th>OrderID</th>
            <th>Amount(RM)</th>
                    </tr>
               
                <tbody>
                @foreach($orders as $order)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{ url('viewFoodList',['orderID' => $order -> orderID]) }}">{{$order -> orderID}} </a></td>
            <td>{{$order -> amount}}</td>
        </tr>
        @endforeach 
        <tr>
            <td colspan="5"><h6>Total: RM {{$orders->sum('amount')}}</h6></td>
        </tr>
                </tbody>
            </table>
        
    </div>
</div>

@endsection