<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Order;



class AdminController extends Controller
{
    //
    public function user()
    {
        $data = User::all();
        return view("admin.users", compact("data"));
    }



    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }



    public function foodmenu()
    {
        $data = Food::all();
        return view("admin.foodmenu", compact("data"));
    }




    public function updateview($id)
    {
        $data = Food::find($id);


        return view("admin.updateview", compact("data"));
    }


    public function update(Request $request, $id)
    {
        $data = Food::find($id);


        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        Alert::success('Berhasil', 'Menu Berhasil Diedit');

        return redirect('/foodmenu');

    }



    public function deletemenu($id)
    {
        $data = Food::find($id);
        $data->delete();

        Alert::success('Berhasil', 'Menu Berhasil Dihapus');

        return redirect()->back();
    }



    public function upload(Request $request)
    {
        $data = new Food;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;


        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        Alert::success('Success', 'Menu Berhasil Ditambahkan');

        return redirect()->back();
    }



    public function reservation(Request $request)
    {
        if (Auth::id()) {
            $data = new Reservation;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->guest = $request->guest;
            $data->date = $request->date;
            $data->id_meja = $request->id_meja;
            $data->time = $request->time;
            $data->message = $request->message;
            $data->save();

            $meja = Meja::find($request->id_meja);
            $meja->status = '0';
            $meja->save();

            return redirect()->back();
        } else {
            return redirect('/auth');
        }
    }



    public function viewreservation()
    {


        $reservation = Reservation::all();

        return view("admin.adminreservation", compact("reservation"));
    }



    public function viewchef()
    {
        $data = Foodchef::all();
        return view("admin.adminchef", compact("data"));
    }



    public function uploadchef(Request $request)
    {
        $data = new Foodchef;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);

        $data->image = $imagename;


        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->back();
    }



    public function updatechef($id)
    {
        $data = Foodchef::find($id);

        return view("admin.updatechef", compact("data"));
    }



    public function updatefoodchef(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            // Find the existing record by ID
            $data = Foodchef::findOrFail($id);

            // Check if a new image file is uploaded
            if ($request->hasFile('image')) {
                // Handle image upload
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('chefimage', $imagename);
                $data->image = $imagename;
            }

            // Update other attributes
            $data->name = $request->name;
            $data->speciality = $request->speciality;

            // Save changes to the database
            $data->save();

            return redirect('viewchef')->with('success', 'Chef updated successfully.');
        } catch (\Exception $e) {
            // Handle exceptions, you may want to log the error
            return redirect()->back()->with('error', 'An error occurred while updating the chef.');
        }
    }



    public function deletechef($id)
    {
        $data = Foodchef::find($id);

        $data->delete();

        return redirect()->back();

    }




    public function orders()
    {
        $data = Order::all();


        return view('admin.orders', compact('data'));
    }

    public function statusfood(Request $request, $id)
    {
        $data = Food::find($id);
        $data->status = $request->status;
        $data->save();

        return redirect('/foodmenu');
    }

}
