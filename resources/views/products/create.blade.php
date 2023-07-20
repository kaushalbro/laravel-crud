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
            <form class="col-5 g-4" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                {{-- localhost/product --}}
                @csrf
                @method('POST')
                <h1>Add new Product</h1>
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
                    <input type="text" class="form-control" id="name" name="name">
                    @if ($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    @if ($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <div class="col-md-12">
                    <label for="brand" class="form-label">Genereic,Brand</label>
                    <input type="text" class="form-control" id="name" name="brand">
                    @if ($errors->has('brand'))
                        <div class="error text-danger">{{ $errors->first('brand') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="cp" class="form-label">Cost Price (in rs)</label>
                    <input name="cost_price"type="number" class="form-control" id="cp" placeholder="Rs 1500">
                    @if ($errors->has('cost_price'))
                        <div class="error text-danger">{{ $errors->first('cost_price') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="sp" class="form-label">Selling Price (in rs)</label>
                    <input name="selling_price"type="number" class="form-control" id="sp" placeholder="Rs 1500">
                    @if ($errors->has('selling_price'))
                        <div class="error text-danger">{{ $errors->first('selling_price') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="total-stock" class="form-label">Total stock</label>
                    <input name="total_stock" type="number" class="form-control" id="total-stock"
                        placeholder="Rs 1500">
                    @if ($errors->has('total_stock'))
                        <div class="error text-danger">{{ $errors->first('total_stock') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="minimum-stock" class="form-label">Minimum Stock</label>
                    <input name="minimum_stock"type="number" class="form-control" id="minimum-stock"
                        placeholder="Rs 1500">
                    @if ($errors->has('minimum_stock'))
                        <div class="error text-danger">{{ $errors->first('minimum_stock') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Product image</label>
                    <input class="form-control" type="file" id="img" name="image">
                    @if ($errors->has('image'))
                        <div class="error text-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form> 
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
