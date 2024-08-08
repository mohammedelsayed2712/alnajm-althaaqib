<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function setting() {
        $footer = [
            'siteInfo' => [
                'title' => Setting::where('key', 'website_title')->value('value'),
                'description' => Setting::where('key', 'website_desc')->value('value'),
            ],
            'Contact' => [
                'title' => Setting::where('key', 'contact_title')->value('value'),
                'phone1' => Setting::where('key', 'contact_phone1')->value('value'),
                'phone2' => Setting::where('key', 'contact_phone2')->value('value'),
                'phone3' => Setting::where('key', 'contact_phone3')->value('value'),
                'email' => Setting::where('key', 'contact_email')->value('value'),
            ],
            'footerInfo' => [
                'description' => Setting::where('key', 'footer_desc')->value('value'),
                'icons' => json_decode(Setting::where('key', 'footer_social_icons')->value('value'), true),
            ],
        ];

        return response()->json($footer);
    }
}
