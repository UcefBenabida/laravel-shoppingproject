<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier | Shoping</title>
    <link rel="stylesheet" href="/../materialize/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('headre-links')

    <script src="/../jquery/jquery.js"></script>


    @yield('style')

    <style>
        .nav-bar{
            background-color: rgb(241, 175, 52);

        }

        #total-quantity{
            border-radius: 50%;
            background-color: blueviolet;
            text-align: center;
            color: white;
            padding-left: 3px;
            padding-right: 3px;
            margin-left: -10px;
            font-size: 11px;
        }
    </style>

</head>
<body>
    <div  class="container">
        <div class="section"></div>
                <nav  class="nav-bar">
                    <div class="nav-wrapper">
                        <ul id="nav-mobile">
                            <li class="col s3 m3 l3 xl3">
                                <a href="/"><i class="material-icons large">home</i></a>
                            </li>
                            <li class="col s3 m3 l3 xl3">
                                <a href="{{ route('products.list')}}"><i class="material-icons large">shop</i></a>
                            </li>
                            <li class="col s3 m3 l3 xl3 material-icons">
                                <a href="{{ route('cart.list') }}" ><i class="material-icons large">shopping_cart</i></a>
                            </li>
                            <li>
                                <b id="total-quantity" >{{ Cart::getTotalQuantity() }}</b>
                            </li>
                            
                        </ul>
                    </div>
                       
                </nav>
        
    @yield('content')
    
    </div>

    @yield('script')
</body>
</html>