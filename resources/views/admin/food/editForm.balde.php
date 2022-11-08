<!Doctype html>
<html>
    <head>
        <title>Edit Food</title>
        @if(!Session::has('adminData'))
            <script type="text/javascript">
                window.location.href="{{url('admin/login')}}"
            </script>
        @endif
    </head>
    <body>
        <div class="container">
            <form action="{{ route('food.update') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @foreach($foods as $food)
                <div class="form-group">
                    <label for="name">Food Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$food->name}}">
                    <input type="hidden" id="foodID" name="foodID" value="{{$food->id}}">
                </div>
                <div class="form-group">
                    <label for="description">Food Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$food->description}}">
                </div>
                <div class="form-group">
                    <label for="price">Food Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$food->price}}">
                </div>
                <div class="form-group">
                    <label for="available">Food Available</label>
                    <input type="number" class="form-control" id="available" name="available" value="{{$food->available}}">
                </div>
                <div>
                    <label for="oldImage">Previous Image</label>
                    <img src="{{ asset('images') }}/{{ $food -> image }}" alt="previous image" width="100px" height="100px">
                </div>
                <div class="form-group">
                    <label for="foodImage">Food Image</label>
                    <input type="file" class="form-control" id="foodImage" name="foodImage" value="">
                </div>
                <div class="form-group">
                    <label for="categoryID">Food Category</label>
                    @foreach($categories as $category)
                    <select name="categoryID" id="categoryID" name="categoryID">
                        <option value="{{$category -> id}}">{{$category-> name}}</option>
                    </select>
                    @endforeach
                </div>
                @endforeach
                <button class="btn btn-primary" type="submit">Submit</button>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                @endif
            </form>
        </div>
    </body>
</html>