<?php

namespace App\Http\Controllers\Api\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\website\Equipment;

class EquipmentController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        if ($request->data) {
            Equipment::truncate();
            foreach ($request->data as $index => $value) {
                Equipment::create([
                    'title'       => $value['title'] ?? '',
                    'description' => $value['description'] ?? '',
                    'image'       => $value['image'] ?? '',
                    'art'         => $value['art'] ?? '',
                    'sort'        => $index + 1,
                    'status'      => $value['status'] ?? 1,
                ]);
            }
        }

        return response()->json(['message' => 'success'], 200);
    }

    public function list()
    {
        $data = Equipment::orderBy('sort')->orderBy('id')->get();

        return response()->json(['message' => 'success', 'data' => $data], 200);
    }
}
