<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="form" action="{{ route('products.update_data', ['id'  =>  $product["id"] ]) }}" method="POST">
        @csrf
        @if (isset($message))
            {{$message}}
        @endif
        <input type="text" onkeyup="handleField(event)"  name="name" value=" {{ $product["name"] }} " placeholder="Ingresar campo nombre*" ><br>
        <span hidden style="color: red" id="name_message" >El campo nombre es obligatorio*</span><br>
        <textarea name="remarks" onkeyup="handleField(event)" id="" cols="30" rows="10" placeholder="Ingresar descripción*">{{ $product["remarks"] }}  </textarea><br>
        <span hidden style="color: red" id="remarks_message" >El campo descripción es obligatorio*</span>

        <select name="brand" id="brand" onchange="handleField(event)">
            <option value="">Seleccionar Marca</option>
            <option value="{{$product['brand']}}" selected style="color: green"> {{$product['brand']}} </option>
            {{-- @foreach ($brands as $brand)
                <option value=" {{ $brand }} "> {{ $brand }} </option>
            @endforeach --}}
        </select><br>
        <span hidden style="color: red" id="brand_message" >El campo marca es obligatorio*</span>
        <br>
        
        <input type="number" name="quantity" value="{{ $product['quantity'] }}" onkeyup="handleField(event)" >
        <br>
        <span hidden style="color: red" id="quantity_message" >El campo cantidad es obligatorio*</span>

        <br>
        <a href="{{ route('products.delete', ['product_id'  =>  $product["id"] ]) }}"
            style="background: rgb(238, 255, 0);color:white"> Volver</a>
        <button type="submit" id="update" style="background:green;color:white">Actualizar</button>
    </form>
</body>
<script>
    const handleSubmit = (e) => {
        e.preventDefaul();
    }
    function handleField(e) {
        const btnUpdate = document.getElementById('update')
        if (!e.target.value ||  Number(e.target.value) > 0) {
            
            switch (e.target.name) {
                case  'remarks':
                    document.getElementById('remarks_message').hidden = false
                    break;
                case 'name':
                    document.getElementById('name_message').hidden = false
               
                default:
                    break;
            } 
            return update.disabled = true;
        }
        return update.disabled = false;
    }
</script>
</html>