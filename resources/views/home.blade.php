
@extends('master.layout')

@section('title')
Home | Shoping
@endsection

@section('style-links')
    <link type="text/css" rel="stylesheet" href="/../materialize/css/materialize.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/../css/home.css" rel="stylesheet">

@endsection


@section('content')

<div class="container" >

  <div class="section"></div>

  @include('master.navbar')

  <div class="divider"></div>
  <div class="section"></div>

  <div id="add-to-cart-message">c'est le message ne me supprime pas je suis pas là par hazard</div>

  @if (isset($products))

    <div class="row" >

    @foreach ($products as $product)

      

        <div class="col s12 m6 l4 xl3">

          <a href="{{ route('product-profile', $product->id) }}" class="">

          <div class="card large hoverable" >


            <div class="card-img center-align" >
    
              <img  class="responsive-img center-align image" src="/../images/{{ $product->image }}" alt="image" />
              <a href="#" class="halfway-fab btn-floating pink btn-favorite">
                <i class="material-icons">favorite_border</i>
              </a>
            </div>

            <div class="card-content smaller">
              <span class="card-title">{{ $product->name }}</span>
              <span class="card-description">{{ Str::limit($product->description, 100) }} </span>
            </div>

            <div class="card-action">
              <a href="{{ route('product-profile', $product->id) }}"><i class="material-icons">launch</i></a>
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


    @endforeach



  @endif

  <div id="box" >not yet</div>


</div>

    
@endsection

@section('javascript')
    <script src="/../js/home.js"></script>
    <script type="text/javascript" src="/../materialize/js/materialize.js"></script>

@endsection