<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>PDF</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') }}">
    </head>
    <body>
       <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Categoria</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $category)
                        <tr>
                            <td style="vertical-align: middle;">{{$category->id}}</td>
                            <td style="vertical-align: middle;">{{$category->name}}</td>
                            <td style="vertical-align: middle;">{{$category->description}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Categoria</th>
                        <th>Descripcion</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>