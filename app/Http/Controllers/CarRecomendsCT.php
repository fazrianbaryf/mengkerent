<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarUnits;
use App\Models\CarRecomends;

class CarRecomendsCT extends Controller
{
    public function index()
    {
        $carUnits = CarUnits::all();
        $recommendedCars = CarRecomends::with('carUnit')->get();

        return view('car-recommendations',  [
            'title' => 'Car Recommendations',
            'carUnits' => $carUnits,
            'recommendedCars' => $recommendedCars,
        ]);
    }

    public function addCarRecomend(Request $request)
    {
        $request->validate([
            'car_recomend_id' => 'required|exists:car-units,id',
        ]);

        CarRecomends::create([
            'car_recomend_id' => $request->car_recomend_id,
        ]);

        return redirect()->back()->with('success', 'Car added to recommendations successfully.');
    }

    public function removeCarRecomend($id)
    {
        $carRecomend = CarRecomends::find($id);

        if ($carRecomend) {
            $carRecomend->delete();
            return redirect()->back()->with('success', 'Car recommendation removed successfully.');
        }

        return redirect()->back()->with('error', 'Car recommendation not found.');
    }
}
