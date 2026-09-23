<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use App\models\website\AboutHrItem;
use App\models\website\AboutHrSetting;
use Illuminate\Http\Request;

class AboutHrController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        if ($request->page) {
            $page = $request->page;
            $setting = AboutHrSetting::first();
            if (!$setting) {
                $setting = new AboutHrSetting();
            }
            $setting->section_title = $page['section_title'] ?? 'Nhân lực';
            $setting->subtitle = $page['subtitle'] ?? '';
            $setting->intro_content = $page['intro_content'] ?? '';
            $setting->main_image = $page['main_image'] ?? '';
            $setting->training_title = $page['training_title'] ?? 'ĐÀO TẠO & PHÁT TRIỂN';
            $setting->health_title = $page['health_title'] ?? 'KHÁM SỨC KHỎE ĐỊNH KỲ';
            $setting->health_image = $page['health_image'] ?? '';
            $setting->health_text = $page['health_text'] ?? '';
            $setting->health_badge_image = $page['health_badge_image'] ?? '';
            $setting->footer_text = $page['footer_text'] ?? '';
            $setting->save();
        }

        $features = $request->features ?? [];
        AboutHrItem::where('type', AboutHrItem::TYPE_FEATURE)->delete();
        foreach ($features as $i => $item) {
            AboutHrItem::create([
                'type'        => AboutHrItem::TYPE_FEATURE,
                'title'       => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
                'image'       => $item['image'] ?? '',
                'sort'        => $item['sort'] ?? $i + 1,
                'status'      => $item['status'] ?? 1,
            ]);
        }

        $training = $request->training ?? [];
        AboutHrItem::where('type', AboutHrItem::TYPE_TRAINING)->delete();
        foreach ($training as $i => $item) {
            AboutHrItem::create([
                'type'        => AboutHrItem::TYPE_TRAINING,
                'title'       => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
                'image'       => $item['image'] ?? '',
                'sort'        => $item['sort'] ?? $i + 1,
                'status'      => $item['status'] ?? 1,
            ]);
        }

        return response()->json(['message' => 'success'], 200);
    }

    public function list()
    {
        $page = AboutHrSetting::first();
        $features = AboutHrItem::where('type', AboutHrItem::TYPE_FEATURE)
            ->orderBy('sort')
            ->orderBy('id')
            ->get();
        $training = AboutHrItem::where('type', AboutHrItem::TYPE_TRAINING)
            ->orderBy('sort')
            ->orderBy('id')
            ->get();

        return response()->json([
            'message'  => 'success',
            'page'     => $page,
            'features' => $features,
            'training' => $training,
        ], 200);
    }
}
