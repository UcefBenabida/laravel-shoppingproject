

function isInViewport() {
    const element = document.querySelector('#box');
    const rect = element.getBoundingClientRect();
    return (
        rect.bottom <= (window.innerHeight - 150)
    );
}

//document.getElementsByClassName("container")[0].addEventListener("onclick", viewPortActions());

$(document).bind("mousewheel", function(){

    if(isInViewport())
    {
        document.getElementById("box").innerHTML = "I have changed by vieport";
    }

});




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



  function addToCart(id)
  {
    var token = document.getElementsByName('_token')[0].value;
    var name = document.getElementById(id + '-name').value;
    var price = document.getElementById(id + '-price').value;
    var image = document.getElementById(id + '-image').value;
    var quantity = document.getElementById(id + '-quantity').value;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
      refreshQuantity();
      message(this.responseText);
      }


    xhttp.open("POST", "cart");

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("_token=" + token + "&id=" + id + "&name=" + name + "&price=" + price + "&image=" + image + "&quantity=" + quantity);
    

  }

  function refreshQuantity()
  {

    var token = document.getElementsByName('_token')[0].value;

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {

      console.log(this.responseText);

      document.getElementById('total-quantity').innerHTML = this.responseText;

      }


    xhttp.open("POST", "total-quantity");

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("_token=" + token);
  }