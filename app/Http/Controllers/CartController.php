<?php

namespace App\Http\Controllers;

use App\Book;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $cartItems=\Cart::getContent();
        return view('cart.cart',compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function store1(Book $book)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($book) {
            return $cartItem->id === $book->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item ya está en el carrito!');
        }

        $tiendaduplicates = Cart::search(function ($cartItem, $rowId) use ($book) {
            return $cartItem->tienda === $book->tienda;
        });

        if ($tiendaduplicates->isNotEmpty()) {
        Cart::add($book->id, $book->name, 1, $book->price)
            ->associate('App\Book');

        return redirect()->route('cart.index')->with('success_message', 'Item agregado al carrito!');
        }else{

            Cart::destroy();
            Cart::add($book->id, $book->name, 1, $book->price)
            ->associate('App\Book');

            return redirect()->route('cart.index')->with('success_message', 'Item agregado al carrito!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function recoverItems(Request $request)
    {
        header("Content-type: application/json; charset=utf-8;  ");
        $json_input = file_get_contents("php://input");
        $utf8_encoded = utf8_encode($json_input);
        $array_decoded = json_decode($utf8_encoded, true);
        $array_num = count($array_decoded);

        for ($i = 0; $i < $array_num; ++$i){

            $id = $array_decoded[$i]['id'];
            $name = $array_decoded[$i]['name'];
            $price = $array_decoded[$i]['price'];
            $qty = $array_decoded[$i]['qty'];

            \Cart::add($id,$name,1,$price);
            \Cart::update($id,['qty'=>$qty]);
        
        }
    }

    public function store(Request $request)
    {
        header("Content-type: application/json; charset=utf-8;  ");
        $json_input = file_get_contents("php://input");
        $utf8_encoded = utf8_encode($json_input);
        $array_decoded = json_decode($utf8_encoded, true);
        $array_num = count($array_decoded);

        for ($i = 0; $i < $array_num; ++$i){

            $id = $array_decoded[$i]['id'];
            $name = $array_decoded[$i]['name'];
            $price = $array_decoded[$i]['price'];
            $qty = $array_decoded[$i]['qty'];

            $book=Book::find($id);
        }
        \Cart::add($id,$name,1,$price)->associate('App\Book');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update()
    {
        //        dd(Cart::content());
        //        dd($request->all());
        header("Content-type: application/json; charset=utf-8;  ");
        $json_input = file_get_contents("php://input");
        $utf8_encoded = utf8_encode($json_input);
        $array_decoded = json_decode($utf8_encoded, true);
 
        $qty = $array_decoded['qty'];
        $id = $array_decoded['id'];
            
        \Cart::update($id,['qty'=>$qty]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->bookQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

       /**
     * Remove the specified resource from storage.
     ** @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        
        header("Content-type: application/json; charset=utf-8;  ");
        $json_input = file_get_contents("php://input");
        $utf8_encoded = utf8_encode($json_input);
        $array_decoded = json_decode($utf8_encoded, true);
        $id = $array_decoded['id'];
        print($id);
        \Cart::remove($id);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Book');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }
    
}
