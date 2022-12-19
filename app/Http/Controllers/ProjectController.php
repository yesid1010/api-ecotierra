<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Module;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        return Project::with('modules.registers')->get();
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());

        if ($project) {
            return response()->json([
                'status' => '201',
                'message' => 'Proyecto creada satisfactoriamente',
                'data' => $location
            ]);
        }

        return response()->json([
            'status' => '400',
            'message' => 'Error al crear proyecto',
        ]);
    }
}
