<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\City;
use App\Models\Renter;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $city = City::all();

        return view('renter.profile',[
            'cities' => $city
        ]);
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $data = $request->validated();

        if($request->file('logo')){
            if(auth()->user()->renter->logo != null){
                $file_path = storage_path('/app/public/'.auth()->user()->renter->logo);
                unlink($file_path);                
            }
            $extension  = request()->file('logo')->getClientOriginalExtension();
            $image_name = time() .'.' . $extension;
            $data['logo'] = $request->file('logo')->storePubliclyAs('logo', $image_name, 'public');
        }

        Renter::where('id', auth()->user()->renter->id)->update($data);

        return to_route('dashboard.index')->with('success','Berhasil memperbarui profil anda.');
    }

    public function renterPage(Request $request)
    {   
        $search = $request->search;
        
        $renter = Renter::with('user')->paginate(10);

        if($search != null){
            $renter = Renter::with('user')->where('name', 'iLIKE', "%{$search}%")->orWhere('address', 'iLIKE', "%{$search}%")->paginate(10)->withQueryString(); 
        } else {
            $renter = Renter::with('user')->paginate(10)->withQueryString();
        }

        return view('admin.renter',[
            'renters' => $renter
        ]);
    }

    public function renterDelete($id)
    {
        $renter = Renter::where('user_id',$id)->first();

        if($renter->logo != null){
            $file_path = storage_path('/app/public/'.$renter->logo);
            unlink($file_path);                
        }
        
        User::destroy($id);

        return back()->with('success','Berhasil menghapus data penyewa yang dipilih.');
    }
}
