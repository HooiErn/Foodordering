<!Doctype html>
<html>
    <head>
        <title>Add Food</title>
        @if(!Session::has('adminData'))
            <script type="text/javascript">
                window.location.href="{{url('admin/login')}}"
            </script>
        @endif
    </head>
    <body>
        <div class="container">
            <form action="{{ route('food.add') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Food Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Food Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="price">Food Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="available">Food Available</label>
                    <input type="number" class="form-control" id="available" name="available">
                </div>
                <div class="form-group">
                    <label for="foodImage">Food Image</label>
                    <input type="file" class="form-control" id="foodImage" name="foodImage">
                </div>
                <div class="form-group">
                    <label for="categoryID">Food Category</label>
                    <select name="categoryID" id="categoryID" name="categoryID">
                        @foreach($categories as $category)
                            <option value="{{$category -> id}}">{{$category-> name}}</option>
                        @endforeach
                    </select>
                </div>
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