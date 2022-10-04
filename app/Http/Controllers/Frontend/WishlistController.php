<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.whislist.whislist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if (Auth::check()) {

            // product_id from js ajax
            $prod_id = $request->input('product_id');


            $prod_check = Product::where('id', $prod_id)->first();

            if ($prod_check) {
                if (Wishlist::where('prod_id',   $prod_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Alredy Added to Whislist"]);
                } else if (Product::find($prod_id)) {
                    $wish = new  Wishlist();
                    $wish->prod_id  =   $prod_id;
                    $wish->user_id  =  Auth::id();
                    $wish->save();
                    return response()->json(['status' => 'Product Added to Wishlist']);
                } else {
                    return response()->json(['status' => 'Product doesnot exist']);
                }
            }
        } else {
            return response()->json(['status' => 'Login to Continue :)']);
        }
    }



    public function deleteitem(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id'); // 'prod_id' ->getting from ajax cart.blade.php

            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Removed From Whislist"]);
            }
        } else {

            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
