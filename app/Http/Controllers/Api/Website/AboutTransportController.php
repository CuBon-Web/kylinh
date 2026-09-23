<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use App\models\website\AboutTransportItem;
use App\models\website\AboutTransportSetting;
use Illuminate\Http\Request;

class AboutTransportController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        if ($request->page) {
            $page = $request->page;
            $setting = AboutTransportSetting::first();
            if (!$setting) {
                $setting = new AboutTransportSetting();
            }
            $setting->section_title = $page['section_title'] ?? 'Phương tiện vận chuyển';
            $setting->subtitle = $page['subtitle'] ?? '';
            $setting->intro_content = $page['intro_content'] ?? '';
            $setting->main_image = $page['main_image'] ?? '';
            $gallery = $page['gallery_images'] ?? [];
            if (!is_array($gallery)) {
                $gallery = [];
            }
            $setting->gallery_images = json_encode(array_values($gallery));
            $setting->quote_text = $page['quote_text'] ?? '';
            $setting->quote_icon = $page['quote_icon'] ?? '';
            $setting->footer_text = $page['footer_text'] ?? '';
            $setting->save();
        }

        $features = $request->features ?? [];
        AboutTransportItem::where('type', AboutTransportItem::TYPE_FEATURE)->delete();
        foreach ($features as $i => $item) {
            AboutTransportItem::create([
                'type'        => AboutTransportItem::TYPE_FEATURE,
                'title'       => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
                'image'       => $item['image'] ?? '',
                'sort'        => $item['sort'] ?? $i + 1,
                'status'      => $item['status'] ?? 1,
            ]);
        }

        $badges = $request->badges ?? [];
        AboutTransportItem::where('type', AboutTransportItem::TYPE_BADGE)->delete();
        foreach ($badges as $i => $item) {
            AboutTransportItem::create([
                'type'        => AboutTransportItem::TYPE_BADGE,
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
        $page = AboutTransportSetting::first();
        if ($page) {
            $page->gallery_images = $page->gallery_list;
        }
        $features = AboutTransportItem::where('type', AboutTransportItem::TYPE_FEATURE)
            ->orderBy('sort')
            ->orderBy('id')
            ->get();
        $badges = AboutTransportItem::where('type', AboutTransportItem::TYPE_BADGE)
            ->orderBy('sort')
            ->orderBy('id')
            ->get();

        return response()->json([
            'message'  => 'success',
            'page'     => $page,
            'features' => $features,
            'badges'   => $badges,
        ], 200);
    }
}
