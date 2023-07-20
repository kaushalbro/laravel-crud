<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="container ">
        <div class="row flex-column align-items-center">
            <form class="col-5 g-4" action="{{ route('product.update',$Product->id) }}" method="POST" enctype="multipart/form-data">
                {{-- localhost/product --}}
                @csrf
                @method('PATCH')
                <h1>Edit Product</h1>
                {{-- @if (session('success'))
                    {{ session('success') }}
                @endif --}}
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                 
                                 <button type="button" class="close" data-dismiss="alert">×</button>	
                                </p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->

                <div class="">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{$Product->name}}" type="text" class="form-control" id="name" name="name">
                </div>
                <div class="">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{$Product->description}}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="Catgory" class="form-label">Category</label>
                    <select id="Category" class="form-select" name="category">
                        <option>Electronics</option>
                        <option>Electrical</option>
                        <option>Goods</option>
                        <option>Books</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{$Product->price}}" name="price"type="number" class="form-control" id="price" placeholder="Rs 1500">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Product image</label>
                    <input class="form-control" type="file" id="img" name="image">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col m-5">
                @if ($Products->count() === 0)


                @else
                <h1>Product Lists</h1>
                    {{-- <p class="bg-danger text-white p-1">no product</p> --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Name</th>
                            <th scope="col">description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th style="height:150px;width:200px" scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Products as $product)
                            <tr>
                                <td scope="row">{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img style="height:100px;width:150px" src="{{ asset('images/'.$product->image) }}"
                                        alt="image"></td>
                                <td class="">
                                    <a href="{{ url('/product/' . $product->id . '/edit') }}"
                                        class="btn btn-primary m-1">edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif







            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
