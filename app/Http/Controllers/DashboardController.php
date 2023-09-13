<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\City;
use App\Models\Comment;
use App\Models\Province;
use App\Models\Renter;
use App\Models\RenterEquipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $province = Province::all();
        $city_id = $request->city_id;
        $province_id = $request->province_id;
        $name = $request->name;
        
        $city = City::where('province_id', $province_id);
        
        if($province_id != null && $city_id != null){
            $renter = Renter::with('user','city','renter_rating')->where('city_id', $city_id);
        } elseif($province_id != null && $city_id == null) {
            $pluck = $city->pluck('id');
            $renter = Renter::with('user','city','renter_rating')->whereIn('city_id', $pluck);
        } elseif($province_id == null && $city_id == null){
            $renter = Renter::with('user','city','renter_rating');
        }

        if($name){
            $renter = $renter->where('name', 'iLIKE', "%{$name}%")->latest()->paginate(6)->withQueryString();
        } else {
            $renter = $renter->latest()->paginate(6)->withQueryString();
        }

        return view('index', [
            'provinces' => $province,
            'renters' => $renter,
            'cities' => $city->get(),
        ]);
    }

    public function fetchCity(Request $request)
    {
        $data['city'] = City::where("province_id", $request->province_id)->get(['id', 'name']);
  
        return response()->json($data);
    }

    public function detail($id)
    {
        $renter = Renter::where('id', $id)->with('user','city','renter_equipment')->first();
        $equipment = RenterEquipment::where('renter_id', $id)->with('equipment')->get();
        $province = Province::all();
        $rating = Comment::where('renter_id',$id)->avg('rating');

        return view('detail', [
            'renter' => $renter,
            'provinces' => $province,
            'equipments' => $equipment,
            'ratingAcc' => $rating,
        ]);
    }

    public function givenRate(RatingRequest $request)
    {
        $data = $request->validated();

        Comment::create($data);

        return back()->with('success','Berhasil menambahkan rating baru.');
    }
}
