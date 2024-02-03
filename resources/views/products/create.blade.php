<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create product</h1>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ( $errors->all() as $error )
            
                <li>{{$error}}</li>

            @endforeach
        </ul>
            
        @endif
    </div>
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        @method('post')


        <div><label for="">title</label><input type="text" name="title" id="title" placeholder="title"></div>

        <div><label for="">Price</label><input type="text" name="price" id="price" placeholder="Price"></div>
        <div><label for="">Saleprice</label><input type="text" name="saleprice" id="saleprice" placeholder="saleprice"></div>
        
        <div><label for="">image</label><input type="file" name="image" id="image"></div>
        <div><label for="">sku</label><input type="text" name="sku" id="sku" placeholder="sku"></div>

        <div><label for="">Description</label><textarea name="description" id="description" cols="30" rows="10" placeholder="description"></textarea></div>

        <div><button type="submit">Save nieuw product</button></div>

    </form>
</body>
</html>