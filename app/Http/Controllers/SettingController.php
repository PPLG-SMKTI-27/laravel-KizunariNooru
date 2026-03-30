<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $keys = [
            'hero_name', 'hero_tagline', 'hero_bio', 'hero_badge',
            'stat_1_value', 'stat_1_label',
            'stat_2_value', 'stat_2_label',
            'stat_3_value', 'stat_3_label',
            'stat_4_value', 'stat_4_label',
            'contact_email', 'contact_location',
            'social_github', 'social_linkedin', 'social_instagram',
            'footer_bio',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return back()->with('success', 'Site settings saved!');
    }
}
