<!doctype html>
<html lang="en">
    <head>
        <title>Importar Excel</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main class="w-75 mx-auto text-center mt-5">

            @if ( ($exito = Session::get('exito')) )
                 <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                 >
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>
                    <strong>¡Hurra! </strong> {{$exito}}
                 </div>
                 
                 <script>
                    var alertList = document.querySelectorAll(".alert");
                    alertList.forEach(function (alert) {
                        new bootstrap.Alert(alert);
                    });
                 </script>
                 
            @endif

        <h2>Importa muchos productos</h2>
            <div class="container">
                <form action="{{route('import_excel_productos')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container mb-2">
                        <input class="form-control" type="file" name="excel_file" id="file" required>
                    </div>
                    <div class="container mb-2">
                        <input class="btn btn-success" type="submit" value="subir excel">
                    </div>
                </form>
            </div>


            <div
                class="table-responsive mt-4"
            >
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">nombre</th>
                            <th scope="col">sku</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                         <tr class="">
                            <td scope="row">{{$producto->nombre}}</td>
                            <td>{{$producto->sku}}</td>
                            <td>{{$producto->descripción}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>
                                <a href="{{ route('edit', $encryptedValue = Crypt::encryptString($producto->id)) }}">editar</a>
                                <a href="">borrar</a>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
