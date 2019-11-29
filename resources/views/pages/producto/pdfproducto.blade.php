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
            <table class="table table-bordered text-center">
                @foreach($product as $product)
                    <tr>
                        <td rowspan="10"><img width="50px" src="./{{ Storage::url($product->image) }}"></td>
                        <td>Referencia</td>
                        <td colspan="7">001</td>
                    </tr>
                    <tr>
                        <td rowspan="4">color</td>
                        <td>blanco</td>
                        <td>negro</td>
                        <td>amarillo</td>
                        <td>rojo</td>
                        <td>fucsia</td>
                        <td>morado</td>
                        <td>gris</td>
                    </tr>
                    <tr>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                    </tr>
                    <tr>
                        <td>verde menta</td>
                        <td>verde militar</td>
                        <td>azul oscuro</td>
                        <td>vino tinto</td>
                        <td>azul rey</td>
                        <td>palo de rosa</td>
                        <td>nude</td>
                    </tr>
                    <tr>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                        <td>estrella</td>
                    </tr>
                    <tr>
                        <td>talla</td>
                        <td colspan="7">XS</td>
                    </tr>
                    <tr>
                        <td>material</td>
                        <td colspan="7">Acetato jabon</td>
                    </tr>
                    <tr>
                        <td>descripcion</td>
                        <td colspan="7">tatatatatatatatatattaatatatatatatatatatta</td>
                    </tr>
                    <tr>
                        <td>precio unidad</td>
                        <td colspan="7">$ 25.000</td>
                    </tr>
                    <tr>
                        <td>precio por mayor</td>
                        <td colspan="7">$ 20.000</td>
                    </tr>
                @endforeach
            </table>
            {{-- <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Referencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                        <tr>
                            <td style="vertical-align: middle;">{{$product->id}}</td>
                            <td style="vertical-align: middle;"><img src="{{ Storage::url($product->image)}}"></td>
                            <td style="vertical-align: middle;">{{$product->reference}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Referencia</th>
                    </tr>
                </tfoot>
            </table> --}}
        </div>
    </body>
</html>