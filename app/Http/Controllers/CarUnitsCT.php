<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarUnits;

class CarUnitsCT extends Controller
{
    public function addCar(Request $request)
    {
        $request->validate([
            'car_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_mobil' => 'required|string|max:100',
            'plat_mobil' => 'required|string|max:50',
            'merk_mobil' => 'required|string|max:50',
            'tahun_mobil' => 'required|integer',
            'transmisi' => 'required|in:matic,manual',
            'car_category' => 'required|in:suv,mvp,sedan',
            'seats' => 'required|integer',
            'kapasitas_mesin' => 'required|string|max:50',
            'warna' => 'required|string|max:50',
            'price_6jam' => 'required|integer',
            'price_12jam' => 'required|integer',
            'price_24jam' => 'required|integer',
        ]);

        // Mengupload file gambar
        $imageName = time().'.'.$request->car_photo->extension();  
        $request->car_photo->move(public_path('images'), $imageName);

        // Menyimpan data ke database
        CarUnits::create([
            'car_photo' => $imageName,
            'nama_mobil' => $request->nama_mobil,
            'plat_mobil' => $request->plat_mobil,
            'merk_mobil' => $request->merk_mobil,
            'jenis_mobil' => $request->jenis_mobil,
            'tahun_mobil' => $request->tahun_mobil,
            'transmisi' => $request->transmisi,
            'car_category' => $request->car_category,
            'seats' => $request->seats,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'warna' => $request->warna,
            'price_6jam' => $request->price_6jam,
            'price_12jam' => $request->price_12jam,
            'price_24jam' => $request->price_24jam,
        ]);

        return redirect()->back()->with('success', 'Car unit added successfully.');
    }

    public function update(Request $request, $id)
{
    $car = CarUnits::find($id);

    if ($car) {
        $car->nama_mobil = $request->input('nama_mobil');
        $car->plat_mobil = $request->input('plat_mobil');
        $car->merk_mobil = $request->input('merk_mobil');
        $car->tahun_mobil = $request->input('tahun_mobil');
        $car->transmisi = $request->input('transmisi');
        $car->car_category = $request->input('car_category');
        $car->seats = $request->input('seats');
        $car->kapasitas_mesin = $request->input('kapasitas_mesin');
        $car->warna = $request->input('warna');
        $car->price_6jam = $request->input('price_6jam');
        $car->price_12jam = $request->input('price_12jam');
        $car->price_24jam = $request->input('price_24jam');

        // Handle file upload for car photo
        if ($request->hasFile('car_photo')) {
            $file = $request->file('car_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $car->car_photo = $filename;
        }

        $car->save();

        // Redirect to detail page with the updated car ID
        return redirect()->route('car-units.show', ['id' => $car->id])->with('success', 'Car updated successfully');
    } else {
        return redirect()->route('car.index')->with('error', 'Car not found');
    }
}

    // public function update(Request $request, $id)
    // {
    //     $car = CarUnits::find($id);

    //     if ($car) {
    //         $car->nama_mobil = $request->input('nama_mobil');
    //         $car->plat_mobil = $request->input('plat_mobil');
    //         $car->merk_mobil = $request->input('merk_mobil');
    //         $car->tahun_mobil = $request->input('tahun_mobil');
    //         $car->transmisi = $request->input('transmisi');
    //         $car->car_category = $request->input('car_category');
    //         $car->seats = $request->input('seats');
    //         $car->kapasitas_mesin = $request->input('kapasitas_mesin');
    //         $car->warna = $request->input('warna');
    //         $car->price_6jam = $request->input('price_6jam');
    //         $car->price_12jam = $request->input('price_12jam');
    //         $car->price_24jam = $request->input('price_24jam');

    //         // Handle file upload for car photo
    //         if ($request->hasFile('car_photo')) {
    //             $file = $request->file('car_photo');
    //             $filename = time() . '_' . $file->getClientOriginalName();
    //             $file->move(public_path('images'), $filename);
    //             $car->car_photo = $filename;
    //         }

    //         $car->save();

    //         return redirect()->route('car.index')->with('success', 'Car updated successfully');
    //     } else {
    //         return redirect()->route('car.index')->with('error', 'Car not found');
    //     }
    // }

    public function destroy($id)
    {
        $car = CarUnits::find($id);
    
        if (!$car) {
            return redirect()->back()->with('error', 'Car unit not found.');
        }
    
        // Hapus gambar dari server
        if (file_exists(public_path('images/' . $car->car_photo))) {
            unlink(public_path('images/' . $car->car_photo));
        }
    
        // Hapus data mobil dari database
        $car->delete();
    
        return redirect()->back()->with('success', 'Car unit deleted successfully.');
    }    
    
    public function index()
    {
        $cars = CarUnits::all();
        return view('car-units', ['cars' => $cars, "title" => "Car Units", "deskripsi" => "Menambahkan unit mobil baru dan mobil investor ke database"]);
    }

    public function show($id)
    {
        // Cari mobil berdasarkan ID
        $car = CarUnits::findOrFail($id);
    
        // Kirim data mobil ke view 'detail-carunits' dengan title
        return view('detail-carunits', [
            'title' => 'Car Units',
            'car' => $car
        ]);
    }
    

        /** Api show */
        public function showApi() {
            $carunits = CarUnits::all();
    
            return response()->json([
                'message' => 'data mobil',
                'data' => $carunits
            ], 200);
        }
    
}