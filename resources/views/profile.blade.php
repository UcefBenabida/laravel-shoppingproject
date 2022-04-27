@extends('master.layout')

@section('title')
{{ $product->name }} | Shoping
@endsection

@section('style-links')
    <link type="text/css" rel="stylesheet" href="/../materialize/css/materialize.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/../css/home.css" rel="stylesheet">

@endsection

@section('style')

    <style>
        .container{
            margin-top: 50px; 
        }
    </style>

@endsection

@section('content')

    <div class="container">

          <?php $home_link = true; ?>

          @include('master.navbar')

          

        <div class="col s12 m12 l12 x12">

            <a href="#" class="">

            <div class="card large hoverable" >


            <div class="card-img center-align" >

        <img  class="responsive-img center-align image" src="/../images/{{ $product->image }}" alt="image" />
                <a href="#" class="halfway-fab btn-floating pink btn-favorite">
                <i class="material-icons">favorite_border</i>
                </a>
            </div>


            <div class="card-content smaller">
                <span class="card-title">{{ $product->name }}</span>
                <span class="card-description">{{ $product->description }} </span>
            </div>

            <div class="card-action">
                <a href="#"><i class="material-icons">launch</i></a>
                <a href="#"><i class="material-icons">credit_card</i></a>

                    @csrf
                <input type="hidden" value="{{ $product->id }}" name="id" />
                <input id="{{$product->id}}-name" type="hidden" value="{{ $product->name }}" name="name" />
                <input id="{{$product->id}}-price" type="hidden" value="{{ $product->price }}" name="price" />
                <input id="{{$product->id}}-image" type="hidden" value="/../images/{{ $product->image }}"  name="image" />
                <input id="{{$product->id}}-quantity" type="hidden" value="1" name="quantity" />
                <button onclick="addToCart({{$product->id}})" class="material-icons add-to-cart z-depth-0" >add_shopping_cart</button>
            
                @if($product->quantity > 0)
                <strong class="prod-price right">{{ number_format($product->price, 2, ',', ' ') }} DH</strong>
                @else
                <b class="right">Produit en rupture de stock</b>
                @endif

                
            </div>


            </div>

        </a>


        </div>
    </div>



@endsection