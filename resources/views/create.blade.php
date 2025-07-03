<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="/products">

    @csrf
        <p>name</p>
        <input type="text" id="name" name="name" >

        <p>price</p>
        <input type="number" id="price" name="price">

        <p>quantity</p>
        <input type="number" name="quantity" id="quantity">

    <button type="submit">Enviar</button>

</form>
</body>
</html>