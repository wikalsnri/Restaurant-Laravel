<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Food;
use App\Models\Order;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\User;
use App\Models\Reservation;


class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $data2 = Foodchef::all();
        $user_id = Auth::id();

        $meja = Meja::all();
        $count = Cart::where('user_id', $user_id)->count();
        return view("home", compact("data", "data2", 'count','meja'));
    }




    public function redirects()
    {
        $data = Food::all();
        $user = User::count();
        $reservasi = Reservation::count();
        $menu = Food::count();
        $order = Order::count();
        $meja = Meja::all();

        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $user_id = Auth::id();

            $count = Cart::where('user_id', $user_id)->count();
            return view('admin.adminhome', compact('count', 'user', 'reservasi', 'menu', 'order','meja'));
            // return redirect('/');

        } else {
            $data = Food::all();
            $data2 = Foodchef::all();
            $user_id = Auth::id();

            $count = Cart::where('user_id', $user_id)->count();
            return view("home", compact("data", 'user', 'reservasi', 'menu', "data2", 'count', 'order','meja'));
        }
    }




    public function addcart(Request $request, $id)
    {


        if (Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            Alert::success('Success', 'Menu Berhasil Ditambahkan');


            return redirect()->back();
        } else {
            return redirect('/auth');
        }
    }




    public function showcart(Request $request, $id)
    {
        $count = Cart::where('user_id', $id)->count();

        if (Auth::id() == $id) {

            $cartItems = Cart::where('user_id', $id)
                ->with('food') // Assuming 'food' is the relationship method in your Cart model
                ->get();

            return view('showcart', compact('count', 'cartItems'));
        } else {
            return redirect()->back();
        }
    }



    public function remove($id)
    {
        $item = Cart::findOrFail($id);

        // Perform the delete action
        $item->delete();

        Alert::success('Success', 'Menu Berhasil Dihapus');

        return redirect()->back();
    }



    public function orderconfirm(Request $request)
    {
        $data = new Order;

        $data->foodname = $request->input('foodname')[0];
        $data->price = $request->input('price')[0];
        $data->quantity = $request->input('quantity')[0];

        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');

        $data->save();

        return redirect()->back();
    }

}
