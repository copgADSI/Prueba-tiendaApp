<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            display: flex;
        }



        .product__card {
            cursor: pointer;
            width: 50%;
            margin: 4%;
            background-color: rgb(71, 162, 201);
            border-radius: 12%;
            color: white;
            display: flex;
            justify-content: center
        }

        .product__card:hover {
            background-color: rgb(32, 111, 145);

        }

        .details {

            width: 50%;
            float: left;
            position: absolute;

        }

        a {
            text-decoration: none
        }
    </style>
</head>

<body>
    <div>

        @foreach ($products as $product)
        <div class="product__card">
            <a href=" {{ route('products.details', ['product_id'  =>  $product["id"] ]) }} ">{{ $product["name"] }}</a>
        </div>
        @endforeach
       
    </div>
</body>
<script>

</script>

</html>