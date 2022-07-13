<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        button {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #000;
            background: #fff;
        }

        .details {
            display: flex;
            margin: 0
        }

        a {
            margin: 20px;
            padding: 10px;
            text-decoration: none
        }
    </style>
    <div class="details">
        <div>
            @if (isset($product))
            <span>Producto: <b>{{ $product["name"] }}</b> </span>
            <br>
            <span>Talla: <b>{{ $product["size"] }}</b> </span>
            <br>
            <span>Observaciones: <b> {{$product["remarks"]}} </b> </span>
            <br>
            <span>Marca: <b> {{$product["brand"]}} </b> </span>
            <br>
            <span>Cantidad: <b> {{$product["quantity"]}} </b> </span>
            <br>
            <span>Fecha Embarque: <b> {{$product["date_shipment"]}} </b> {{ $product["id"] }} </span>
            <section>
                <br>
                <form id="form" action="{{ route('products.update', ['product_id'  =>  $product["id"] ]) }}" method="POST">
                    @csrf
                    <a href="{{ route('products.delete', ['product_id'  =>  $product["id"] ]) }}"
                        style="background: red;color:white"> Eliminar</a>
                    <button  style="background:blue;color:white">Actualizar</button>
                </form>
               
            </section>
            @else
            <section> No se encontró el producto... </section>
            @endif
        </div>

    </div>
</body>

</html>