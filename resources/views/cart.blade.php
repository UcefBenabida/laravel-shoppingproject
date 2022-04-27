@extends('master.frontend')

@section('headre-links')
  <link rel="stylesheet" href="/../css/cart.css">
@endsection

@section('content')
            <div class="container">

              @csrf

              <input type="hidden" name="_server_host" value="{{ route('products.list') }}">


              <div id="add-to-cart-message">c'est le message</div>


                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif


                        <h4 class="center-align text-xl text-bold">Votre panier</h4>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase z-depth-1">
                              <th class="col s3 m3 l3 xl3"></th>
                              <th class="center-align col s4 m4 l4 xl4">Nom</th>
                              <th class="center-align col s1 m1 l1 xl1">Quantité</th>
                              <th class="center-align col s2 m2 l2 xl2"> Prix</th>
                              <th class="center-align col s2 m2 l2 xl2"> Supprimer </th>
                            </tr>
                          </thead>

                          <tbody class="center-align " id="items-table" >
                            
                          </tbody>

                          <tr class="h-12 uppercase">
                            <th class="col s3 m3 l3 xl3"></th>
                            <th class="col s3 m3 l3 xl3"></th>
                            <th class="col s2 m2 l2 xl2"></th>
                            <th class="center-align col s2 m2 l2 xl2">
                              <b id="total-price" class="right" >
                                Total: {{ Cart::getTotal() }} H
                              </b>
                            </th>
                            <th class="col s2 m2 l2 xl2"></th>
                          </tr>


                        </table>

                        <div class="section">

                          <div class="row">

                            <div class="col s6 m6 l6 xl6 center-align ">
                              <button onclick="clearCart()" class="btn-delete" >Vider le panier</button>
                            </div>
  
                            <div class="col s6 m6 l6 xl6 center-align">
                              <button onclick="acheter()" type="submit" class="credit_card">Acheter</button>
                            </div>
  
                          </div>

                          
                        </div>


                      </div>



            </div>
    @endsection

    @section('script')
        <script src="/../js/cart.js"></script>
    @endsection