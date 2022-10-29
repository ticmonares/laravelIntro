<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    
</body>
</html>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Nuevo producto</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Datos del producto
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $products->id) }}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $products->nombre }}" >
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $products->descripcion }}" >
                        </div>
                        <div class="form-group">
                            <label for="existencia">Existencia</label>
                            <input type="number" class="form-control" name="existencia" id="existencia" value="{{ $products->existencia }}" >
                        </div>
                        <div class="form-group">
                            <label for="fotografia">Fotografía</label>
                            <img src="{{ $products->fotografia }}" class="img-fluid"  alt="">
                            <input type="text" class="form-control" name="fotografia" id="fotografia" value="{{ $products->fotografia }}" >
                        </div>
                        <div class="form-footer float-end mt-2">
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>