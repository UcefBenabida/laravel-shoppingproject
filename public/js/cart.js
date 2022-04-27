

$(document).ready(function()
{
  refreshContent();
});


function acheter()
          {

            var quantity = document.getElementById('total-quantity').innerHTML ;
            var host = document.getElementsByName('_server_host')[0].value;



            if(quantity > 0)
            {
              window.location.assign(host + "/checkout");
            }
            else
            {
              message("le panier est vide , allez-vous et trouvez des articles")
            }

          }


          function message(message)
          {

            $(document).ready(function(){

              $("#add-to-cart-message").text(message);

              $("#add-to-cart-message").animate({left: '5%', opacity: '1'}, "slow", function(){
                window.setTimeout(function (){
                  $("#add-to-cart-message").animate({left: '1%', opacity: '0'}, 1000); 
                },
                1500);
              });

            });

          }

          function updateItem(id)
          {


            var token = document.getElementsByName('_token')[0].value;
            
            var quantity = document.getElementById(id + '-quantity').value ;

            const xhttp = new XMLHttpRequest();

            if(quantity > 0)
            {
              xhttp.onload = function() {
                refreshContent();
                message(this.responseText);
              }

              xhttp.open("POST", "update-cart");

              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

              xhttp.send("_token=" + token + "&id=" + id + "&quantity=" + quantity);
            }
            else
            {
              removeItem(id);
            }

          }

          function removeItem(id)
          {

            var token = document.getElementsByName('_token')[0].value;

            const xhttp = new XMLHttpRequest();

            xhttp.onload = function() {
              refreshContent();
              message(this.responseText);
            }

            xhttp.open("POST", "remove");

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send("_token=" + token + "&id=" + id );


          }

          function clearCart()
          {
            var token = document.getElementsByName('_token')[0].value;
            var quantity = document.getElementById('total-quantity').innerHTML ;

            const xhttp = new XMLHttpRequest();

            if(quantity > 0)
            {
              xhttp.onload = function() 
              {
                message(this.responseText);
                refreshContent();
              }

              xhttp.open("POST", "clear");

              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              
              xhttp.send("_token=" + token );

            }
            else
            {
              message("le panier est déjat vide");
            }

           
          }

          function showContentItems(cartItems)
          {

            var token = document.getElementsByName('_token')[0].value;
            var host = document.getElementsByName('_server_host')[0].value;

            var content='<input type="hidden" name="_server_host" value="' + host + '">';

              cartItems.forEach(function(itemUncoded, index)
              {

                let item = JSON.parse(itemUncoded);
              
                content += '<tr class="z-depth-1 hoverable" >';
                content += '<td class="center-align col s3 m3 l3 xl3">';
                content += '<a href="/profile/' + item.id + '">' ;
                content += '<img src="' + item.attributes.image + '" class="cart-image" alt="Thumbnail">' ;
                content += '</a>' ;
                content += '</td>' ;
                content += '<td class="center-align col s4 m4 l4 xl4" >' ;
                content += '<a href="#">' ;
                content += '<p class="mb-2 md:ml-4">' + item.name + '</p>' ;
                content += '</a>' ;
                content += '</td>' ;
                content += '<td class="center-align col s1 m1 l1 xl1">';
                content += '<input onchange="updateItem(' + item.id + ')" id="' + item.id + '-quantity" type="number" value="' + item.quantity + '" class="quantity-update" />' ;
                content += '</td>' ;
                content += '<td class="center-align col s2 m2 l2 xl2">' ;
                content += '<span class="text-sm font-medium lg:text-base center-align">' ;
                content += item.price + ' DH </span></td>' ;
                content += '<td class="center-align col s2 m2 l2 xl2">' ;
                content += '<button onclick="removeItem(' + item.id + ')" class="material-icons delete">delete</button></td></tr>' ;  
              
              });


              document.getElementById('items-table').innerHTML = content ;


          }

          function refreshContent()
          {

              var token = document.getElementsByName('_token')[0].value;

              var cartItems;

              const xhttp = new XMLHttpRequest();

              xhttp.onload = function() {
                const cartItems = JSON.parse(this.responseText);
                refreshQuantity();
                showContentItems(cartItems);
              }

              xhttp.open("POST", "cart.getlist");

              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              
              xhttp.send("_token=" + token + "&return_list=true" );

          }


          function refreshQuantity()
        {

          var token = document.getElementsByName('_token')[0].value;

          const xhttp = new XMLHttpRequest();

          refreshTotal();

          xhttp.onload = function() {

            document.getElementById('total-quantity').innerHTML = this.responseText;

            }

          xhttp.open("POST", "total-quantity");
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("_token=" + token);
        }


        function refreshTotal()
        {

          var token = document.getElementsByName('_token')[0].value;

          const xhttp = new XMLHttpRequest();

          xhttp.onload = function() {

            document.getElementById('total-price').innerHTML = 'Total: ' + this.responseText + ' DH';

            }


          xhttp.open("POST", "total-price");

          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          xhttp.send("_token=" + token);
        }
          