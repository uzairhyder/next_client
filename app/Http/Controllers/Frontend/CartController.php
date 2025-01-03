<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BackendModels\Product;
use App\Models\FrontendModels\Cart;
use App\Models\FrontendModels\Order;
use App\Models\FrontendModels\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addcart(Request $request,$slug){
        $cart = Product::where('slug',$slug)->first();
        Session::put('data',  $cart);
        
        
        

        if(Auth::check()){

            // check in cart if already exist
            $check_wishlist = Wishlist::where('user_id',Auth::id())->where('product_id',$cart->id)->first();
            if(!empty($check_wishlist)){
                $check_wishlist->delete();
            }


            // check in cart if already exist
            if(!empty(Cart::where('product_id',$cart->id)->first())){
                $notification = array('message' => 'This item already added to cart !', 'alert-type' => 'error');
                return back()->with($notification);
            }


            
            
            $order = Order::where('user_id', Auth::id())->where('order_status', null)->orderBy('id','desc')->first();
            

            // check product count behalf of order id
            $inside_cart = '';
            
            // cart product count update
            $update_count = '';
            
            if(empty($order)){
                $new_order = new Order();
                $new_order->user_id = Auth::id();
                $new_order->order_status = null;
                $new_order->save();
                $inside_cart = Cart::where('order_id', $new_order->id)->count();
                $update_count = Order::find($new_order->id);
            }else{
                $inside_cart = Cart::where('order_id', $order->id)->count();
                $update_count = Order::find($order->id);
            }

            

            
            
            $update_count->product_count = $inside_cart + 1;
            $update_count->save();
            



            $addcart = new Cart();
            $addcart->user_id = Auth::user()->id;
            $addcart->product_id = $cart->id;
            // check if order not exist then create order id and add it product
            empty($order) ? $addcart->order_id = $new_order->id : $addcart->order_id = $order->id;
            $addcart->attribute_value = $request->attribute_value;
            $addcart->save();

            
            
            
            

            $notification = array('message' => 'Product Added To Cart !', 'alert-type' => 'success');
            return back()->with($notification);
        }
        $notification = array('message' => 'Please Login First !', 'alert-type' => 'error');
        return redirect()->route('login')->with($notification);

    }
    public function removecart(Request $request,$id){
        $cart = Cart::find($id);

        // check product count behalf of order id
        $inside_cart = Cart::where('order_id',$cart->order_id)->count();

        $cart->delete();
        

        
        // cart product count update
        $update_count = Order::find($cart->order_id);
        $update_count->product_count = $inside_cart - 1;
        $update_count->save();
        // $update_count;



        $notification = array('message' => 'Product Removed from cart!', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
