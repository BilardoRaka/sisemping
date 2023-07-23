<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Renter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $province = Province::all();
        $city_id = $request->city_id;
        $province_id = $request->province_id;
        
        $city = City::where('province_id', $province_id)->get();

        if($city_id == null){
            $renter = Renter::with('user','city')->latest()->get();
        } else {
            $renter = Renter::with('user','city')->where('city_id', $city_id)->latest()->get();
        }

        return view('index', [
            'provinces' => $province,
            'renters' => $renter,
            'cities' => $city
        ]);
    }

    public function fetchCity(Request $request)
    {
        $data['city'] = City::where("province_id", $request->province_id)->get(['id', 'name']);
  
        return response()->json($data);
    }
}
