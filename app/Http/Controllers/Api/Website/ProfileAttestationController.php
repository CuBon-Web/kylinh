<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use App\models\website\ProfileAttestation;
use Illuminate\Http\Request;

class ProfileAttestationController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        if ($request->data) {
            ProfileAttestation::truncate();
            foreach ($request->data as $index => $value) {
                ProfileAttestation::create([
                    'title'  => $value['title'] ?? '',
                    'image'  => $value['image'] ?? '',
                    'sort'   => $index + 1,
                    'status' => $value['status'] ?? 1,
                ]);
            }
        }

        return response()->json(['message' => 'success'], 200);
    }

    public function list()
    {
        $data = ProfileAttestation::orderBy('sort')->orderBy('id')->get();

        return response()->json(['message' => 'success', 'data' => $data], 200);
    }
}
