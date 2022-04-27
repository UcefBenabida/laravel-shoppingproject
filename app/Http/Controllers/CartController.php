<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function getTotalPrice()
    {
        echo \Cart::getTotal();
    }

    public function getTotalNbr()
    {
        echo \Cart::getTotalQuantity();
    }

    public function cartList(Request $request)
    {
        $cartItems;
        $codedItems = Array();
        $jsonItems;
        if(isset($_POST['return_list']) && $_POST['return_list'] == "true")
        {
            $cartItems = \Cart::getContent(); 
            foreach($cartItems as $item)
            {
                $codedItems[] = json_encode($item);
            }
            echo json_encode($codedItems);
        }
        else
        {
            $cartItems = \Cart::getContent();
            // dd($cartItems);
            return view('cart', compact('cartItems'));
        }

    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        //session()->flash('success', 'Product is Added to Cart Successfully !');

        echo "votre article choisi a été ajouté au panier avec succé" ;
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        //session()->flash('success', 'Item Cart is Updated Successfully !');

        echo "vos changements été enrégistrées avec succé";
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        echo "un article été retiré du panier";
    }

    public function clearAllCart(Request $request)
    {
            \Cart::clear();
            echo "votre panier est vide maintenant" ;
        
    }
}
 
