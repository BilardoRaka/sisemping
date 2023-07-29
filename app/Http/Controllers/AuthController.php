<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\City;
use App\Models\MasterEquipment;
use App\Models\Renter;
use App\Models\RenterEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginAttempt(LoginRequest $request)
    {
        $data = $request->validated();

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            Auth::logoutOtherDevices($data['password']);
        
            return to_route('dashboard.index')->with('success','Anda telah berhasil login!');
        }

        return back()->with('failed','Email atau password tidak terdaftar di sistem!');
    }

    public function registrationPage()
    {
        $city = City::all();
        $equipment = MasterEquipment::all();

        return view('auth.registration',[
            'cities' => $city,
            'equipments' => $equipment
        ]);
    }

    public function registrationAttempt(RegistrationRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $equipment = $request->equipment;
        $qty = $request->qty;
        $price = $request->price;

        if($request->file('logo')){
            $extension  = request()->file('logo')->getClientOriginalExtension();
            $image_name = time() .'.' . $extension;
            $data['logo'] = $request->file('logo')->storePubliclyAs('logo', $image_name, 'public');
        }

        $user = User::create([
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'renter',
        ]);

        $renter = Renter::create([
            'user_id' => $user->id,
            'city_id' => $data['city_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'phone' => '62'.$data['phone'],
            'address' => $data['address'],
            'logo' => $data['logo'],
        ]);      

        for ($i=0; $i < count($equipment) ; $i++) {
            RenterEquipment::create([
                'renter_id' => $renter->id,
                'equipment_id' => $equipment[$i],
                'qty' => $qty[$i],
                'price' => $price[$i],
            ]);
        }

        return to_route('login')->with('success','Berhasil registrasi, silahkan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return to_route('dashboard.index')->with('success','Anda telah berhasil logout!');
    }
}