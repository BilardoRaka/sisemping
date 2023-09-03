<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipmentRequest;
use App\Models\MasterEquipment;
use App\Models\RenterEquipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = MasterEquipment::all();
        $renterEquipment = RenterEquipment::where('renter_id', auth()->user()->renter?->id)->get();

        return view('renter.equipment',[
            'equipments' => $equipment,
            'renterEquipments' => $renterEquipment,
        ]);
    }

    public function equipmentUpdate(Request $request)
    {
        $equipment = $request->equipment;
        $qty = $request->qty;
        $price = $request->price;

        RenterEquipment::where('renter_id', auth()->user()->renter?->id)->delete();

        for ($i=0; $i < count($equipment); $i++) { 
            RenterEquipment::create([
                'equipment_id' => $equipment[$i],
                'renter_id' => auth()->user()->renter?->id,
                'qty' => $qty[$i],
                'price' => $price[$i],
            ]);
        }

        return to_route('dashboard.index')->with('success', 'Berhasil mengubah data peralatan camping yang disewakan.');
    }

    public function masterPage()
    {
        $equipment = MasterEquipment::paginate(10);

        return view('admin.equipment',[
            'equipments' => $equipment
        ]);
    }

    public function masterCreate()
    {
        return view('admin.equipmentCreate');
    }

    public function masterStore(CreateEquipmentRequest $request)
    {
        $data = $request->validated();

        MasterEquipment::create($data);

        return to_route('master.equipment.index')->with('success','Berhasil tambah data master equipment!');
    }

    public function masterDelete($id)
    {
        MasterEquipment::destroy($id);

        return back()->with('success', 'Berhasil menghapus master equipment yang dipilih!');
    }
}
