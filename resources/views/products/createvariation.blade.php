<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create variation</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ( $errors->all() as $error )
            
                <li>{{$error}}</li>

            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('variation.storevariation')}}">
        @csrf
        @method('post')


        <div><label for="">productid</label><input type="text" name="productid" id="productid" placeholder="productid"></div>
        <div><label for="">name</label><input type="text" name="name" id="name" placeholder="name"></div>

        <div><label for="">sku</label><input type="text" name="sku" id="sku" placeholder="sku"></div>

        <div><label for="">Price</label><input type="text" name="price" id="price" placeholder="Price"></div>
        <div><label for="">Saleprice</label><input type="text" name="saleprice" id="saleprice" placeholder="saleprice"></div>

        <div><label for="">kleur</label><input type="text" name="kleur" id="kleur" placeholder="kleur"></div>
        <div><label for="">maat</label><input type="text" name="maat" id="maat" placeholder="maat"></div>


        <div><label for="">extra option</label><input type="text" name="extraoption" id="extraoption" placeholder="extraoption"></div>
        <div><label for="">extraoption price</label><input type="text" name="price_eo" id="price_eo" placeholder="price eo"></div>

        
        <div><button type="submit">Save nieuw variation</button></div>

    </form>
</body>
</html>