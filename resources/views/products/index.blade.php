<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <a href="{{route('product.create')}}">add product</a>

    <a href="{{route('product.createvariation')}}">add varation</a>

    <a href="{{route('product.getallproducts')}}">getallproducts</a>

    <a href="{{route('product.getallvariations', ['variation' => 1] )}}">getallvariations</a>

    <div>
        @if ( session()->has('success') )
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>sku</th>
                <th>description</th>
                <th>price</th>
                <th>saleprice</th>
                <th>image</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            @foreach ( $products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->saleprice}}</td>
                    <td>{{$product->image}}</td>
                    <td><a href="{{route('product.edit', ['product' => $product])}}">edit</a></td>
                    <td>
                        <form method="post" action="{{route('product.delete', ['product' => $product])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>


        <table border="1">
            <tr>
                <th>ID</th>
                <th>productid</th>
                <th>sku</th>
                <th>price</th>
                <th>saleprice</th>
                <th>kleur</th>
                <th>maat</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            @foreach ( $variations as $variation)
                <tr>
                    <td>{{$variation->id}}</td>
                    <td>{{$variation->productid}}</td>
                    <td>{{$variation->sku}}</td>
                    <td>{{$variation->price}}</td>
                    <td>{{$variation->saleprice}}</td>
                    <td>{{$variation->kleur}}</td>
                    <td>{{$variation->maat}}</td>
                    <td><a href="{{route('variation.editvariation', ['variation' => $variation])}}">edit</a></td>
                    <td>
                        <form method="post" action="{{route('variation.deletevariation', ['variation' => $variation])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</body>
</html>