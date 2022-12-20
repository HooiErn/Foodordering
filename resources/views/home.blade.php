@extends('layouts.app')

@section('content')
<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>
<div class="container">
                <div class="cart d-flex float-right">
                    <a href="{{ url('/viewCart') }}">Cart</a><span class="text-danger">{{$carts -> count()}}</span>
                </div>

    <form action="{{ url('/add-rating')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Name</th>
                <th>Rating</th>
                <th>Function</th>
            </tr>
            @foreach($foods as $food)
            <tr>
            
            <input type="hidden" name="food_id" value="{{$food -> id}}">
                <td>{{$food -> name}}</td>
                <td>
                    {{$food -> stars_rated}}
                </td>

                <td>
                    <a href="{{ route('view.food',['id' => $food->id])}}" class="btn btn-info">View</a>
                </td>
                
            </tr>
            @endforeach
        </table>
    </form>

    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
</div>

@endsection