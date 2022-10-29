<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

</head>
<body>
    
</body>
</html>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Productos</h1>
        </div>
        <div class="col-12">    

        @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Correcto!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- <script>
          $(".alert").alert();
        </script> -->

            <div class="card">
                <div class="card-header">
                    Listado de productos
                    <a  class="btn btn-success btn-sm float-end" href="{{ route('products.create') }}">Agregar producto</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-responsive" >
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Existencia</th>
                            <th>Descripcion</th>
                            <th>Fotografía</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->nombre }}
                            </td>
                            <td>
                                {{ $product->existencia }}
                            </td>
                            <td>
                                {{ $product->descripcion }}
                            </td>
                            <td>
                                <img src="{{ $product->fotografia }}" alt="" style="width: 150px"  class="img-fluid"  >
                            </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary text-light btn-sm" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('products.destroy', $product->id)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                        @endforeach
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

