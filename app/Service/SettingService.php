<?php

namespace App\Service;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    function getSettings() : array {
        return Cache::rememberForever('settings', function() {
            return Setting::pluck('value', 'key')->toArray(); // ['KEY' => 'VALUE']
        });
    }

    function setGlobalSettings() {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }
}
