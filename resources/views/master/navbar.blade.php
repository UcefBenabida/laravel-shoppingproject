

<div class="row" >
    <div class="col s12">
      <nav class="nav-bar">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo right hide-on-large-only"> Shoping</a>
          <a href="#" class="brand-logo hide-on-med-and-down"> Shoping</a>
          <ul id="nav-mobile" class="right">
            @if (isset($home_link))
              <li class="col s2 m2 l2 xl2">
                <a href="{{ route('products.list')}}"><i class="material-icons large">shop</i></a>
              </li>
            @endif
            <li class="col s3 m3 l3 xl3"><a href="#">Catégories</a></li>
            <li class="col s3 m3 l3 xl3">
              <a href="{{ route('cart.list') }}">
                <i class="large material-icons">shopping_cart</i>  
              </a>
            </li>
            <li>
              <b id="total-quantity">{{ Cart::getTotalQuantity()}}</b>
            </li>
            <li class="col s4 m4 l4 xl4">
              <nav class="nav-search z-depth-0">
                <div class="nav-wrapper">
                  <form>
                    <div class="input-field">
                      <input class="z-depth-0" id="search" type="search" required>
                      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    </div>
                  </form>
                </div>
              </nav>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>