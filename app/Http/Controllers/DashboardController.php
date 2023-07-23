<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $province = Province::all();



        return view('index', [
            'provinces' => $province
        ]);
    }
}
