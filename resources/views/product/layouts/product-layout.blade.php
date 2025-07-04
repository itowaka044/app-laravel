<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>

        @yield("title")

    </title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>

    <header style="
        width: 100%; 
        height: 50px;
        background-color:pink;
        text-align:center;
        display:flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        ">CRUD PRODUTOS</header>
    <br>
    <div style="padding: 10px">

        @yield("content")
        
    </div>    
   
</body>
</html>