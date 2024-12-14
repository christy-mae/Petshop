<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Order;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::where('status', 'available')->get();
        return view('index', compact('pets'));
    }

    public function buy($id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->status === 'sold') {
            session()->flash('error', 'This pet is already sold.');
            return redirect()->route('view.pets');
        }

        $pet->status = 'sold';
        $pet->save();

        $order = Order::create([
            'customer_name' => auth()->user()->name,
            'pet_id' => $pet->id,
            'total_price' => $pet->price,
            'status' => 'completed',
        ]);

        session()->flash('success', "You purchased {$pet->name} for $ {$order->total_price}.");
        return redirect()->route('dashboard');
    }

    public function view($id)
    {
        $pet = Pet::findOrFail($id);
        return view('view', compact('pet'));
    }

    public function buyPet(Request $request, $id)
    {
        try {
            $pet = Pet::findOrFail($id);

            if ($pet->status === 'sold') {
                return response()->json(['success' => false, 'message' => 'This pet is already sold.']);
            }

            $pet->status = 'sold';
            $pet->save();

            $order = Order::create([
                'customer_name' => auth()->user()->name,
                'pet_id' => $pet->id,
                'total_price' => $pet->price,
                'status' => 'completed',
            ]);

            // Instead of using session()->flash(), we are directly sending the success message to the AJAX response
            return response()->json([
                'success' => true,
                'message' => "You purchased {$pet->name} for $ {$order->total_price}.",
                'redirect' => route('dashboard'),
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your purchase. Please try again.',
            ], 500);
        }
    }
}
