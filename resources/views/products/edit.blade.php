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
            <form class="col-5 g-4" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
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
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a
                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
                <div class="">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $product->name}}" type="text" class="form-control" id="name" name="name">
                </div>
                <div class="">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $product->description}}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="brand" class="form-label">Genereic,Brand</label>
                        <input value="{{ $product->brand}}" type="text" class="form-control" id="name" name="brand">
                    </select>
                </div>
                <div class="col-12">
                    <label for="cp" class="form-label">Cost Price (in rs)</label>
                    <input  value="{{ $product->cost_price}}"  name="cost_price"type="number" class="form-control" id="cp" placeholder="Rs 1500">
                </div>
                <div class="col-12">
                    <label for="sp" class="form-label">Selling Price (in rs)</label>
                    <input value="{{ $product->selling_price}}"  name="selling_price"type="number" class="form-control" id="sp" placeholder="Rs 1500">
                </div>
                <div class="col-12">
                    <label for="total-stock" class="form-label">Total stock</label>
                    <input  value="{{ $product->total_stock}}"  name="total_stock" type="number" class="form-control" id="total-stock" placeholder="Rs 1500">
                </div>
                <div class="col-12">
                    <label for="minimum-stock" class="form-label">Minimum Stock</label>
                    <input  value="{{ $product->minimum_stock}}"  name="minimum_stock"type="number" class="form-control" id="minimum-stock" placeholder="Rs 1500">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Product image</label>
                    <input value="{{ $product->image}}"  class="form-control" type="file" id="img" name="image">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
