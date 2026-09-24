<?php

namespace App\Http\Controllers;

use App;
use App\Models\Admin\Language;
use App\Models\Localization;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        $locale = trim($locale);
        $language = Language::where('code', $locale)->where('status', 'active')->first();
        if (! $language) {
            return redirect()->back();
        }

        session(['locale' => $language->code]);

        $isExisted = Localization::where('ip', \Request::ip())->first();
        if ($isExisted) {
            Localization::where('ip', \Request::ip())->update(['current_language' => $language->code]);
        } else {
            $localization = new Localization;
            $localization->current_language = $language->code;
            $localization->ip = \Request::ip();
            $localization->save();
        }
        App::setLocale($language->code);

        return redirect()->back();
    }
}
