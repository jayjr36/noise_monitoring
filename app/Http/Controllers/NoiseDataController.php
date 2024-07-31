<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoiseData;

class NoiseDataController extends Controller
{
    public function index()
    {
        return NoiseData::orderBy('created_at', 'desc')->take(50)->get();
    }


    public function showGraph()
    {
        $noiseData = NoiseData::orderBy('created_at', 'desc')->take(50)->get();
        return view('displaypage', ['noiseData' => $noiseData]);
    }
    
    public function showTable()
    {
        $noiseData = NoiseData::orderBy('created_at', 'desc')->get();
        return view('noise-table', ['noiseData' => $noiseData]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sensor_id' => 'required|string',
            'noise_level' => 'required|numeric',
        ]);

        $noiseData = NoiseData::create($data);

        return response()->json($noiseData, 201);
    }
}
