<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return Location::all();
    }

    public function store(Request $request)
    {
        $location = Location::create($request->all());
        if ($location) {
            return response()->json([
                'status' => '201',
                'message' => 'Ubicación creada satisfactoriamente',
                'data' => $location
            ]);
        }

        return response()->json([
            'status' => '400',
            'message' => 'Error al crear ubicación',
        ]);
    }

    public function show($id)
    {
        $location =  Location::find($id);
        if (!$location) {
            return response()->json([
                'status' => '404',
                'message' => 'Ubicación no encontrada',
            ]);
        }

        return $location;
    }

    public function update(Request $request, $id)
    {
        $location = Location::find($id);

        if ($location) {
            $location->update($request->all());
            return response()->json([
                'status' => '201',
                'message' => 'Ubicación actualizada satisfactoriamente',
                'data' => Location::find($id)
            ]);
        }

        return response()->json([
            'status' => '400',
            'message' => 'Error al Editar ubicación',
        ]);
    }

    public function destroy($id)
    {
        $location = Location::find($id);
        if ($location) {

            $location->delete();
            return response()->json([
                'status' => '201',
                'message' => 'Ubicación eliminada satisfactoriamente',
            ]);
        }
        return response()->json([
            'status' => '400',
            'message' => 'Error al eliminar ubicación',
        ]);
    }
}
