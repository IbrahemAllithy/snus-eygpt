<?php

namespace App\Services\Web;

use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Currency;
use App\Models\Admin\HomeBanner;
use App\Models\Admin\Language;
use App\Models\Admin\Page;
use App\Models\Localization;
use App\Traits\ApiResponser;

class HomeService
{
    use ApiResponser;

    public function homeIndex()
    {
        $data['language'] = $this->getLanguage();
        $data['currency'] = $this->getCurrency();
        $data['category'] = $this->getCategory();
        $data['brands'] = $this->getBrands();

        $data['selectedLenguage'] = $this->selectedLenguage();
        $data['selectedLenguageName'] = $this->selectedLenguageName();

        $data['selectedCurrency'] = $this->selectedCurrency();
        $data['selectedCurrencyName'] = $this->selectedCurrencyName();
        $data['selectedCurrencySymbol'] = $this->selectedCurrencySymbol();

        $data['direction'] = $this->selectedLenguagePosition();
        $data['pages'] = $this->contentpages();
        $data['homeBanners'] = $this->HomeBanners();

        return $data;
    }

    public function getLanguage()
    {
        return Language::where('status', 'active')->get();
    }

    public function getCurrency()
    {
        return Currency::where('status', 'active')->get();
    }

    public function getCategory()
    {
        $category = Category::with('detail')->with('gallary')->with('icon');
        $languageId = $this->selectedLenguage();
        $category = $category->getCategoryByLanguageId($languageId);

        return $category->get();
    }

    public function getBrands()
    {
        return Brand::with('gallary')
            ->where('status', 'active')
            ->whereHas('products', function ($query) {
                $query->active();
            })
            ->orderBy('name')
            ->get()
            ->unique('brand_slug')
            ->values();
    }

    public function selectedLenguage()
    {
        return $this->currentLanguage()->id;
    }

    public function selectedLenguageName()
    {
        return $this->currentLanguage()->name;
    }

    public function selectedLenguagePosition()
    {
        return $this->currentLanguage()->direction;
    }

    private function currentLanguage()
    {
        $code = session('locale');
        if (is_string($code) && $code !== '') {
            $language = Language::where('code', $code)->where('status', 'active')->first();
            if ($language) {
                return $language;
            }
        }

        $saved = Localization::where('ip', \Request::ip())->first();
        if ($saved) {
            $language = Language::where('code', $saved->current_language)->where('status', 'active')->first();
            if ($language) {
                return $language;
            }
        }

        return Language::where('is_default', 1)->first()
            ?? Language::where('status', 'active')->first();
    }

    public function selectedCurrency()
    {
        return Currency::where('is_default', 1)->first()->id;
    }

    public function selectedCurrencyName()
    {
        return Currency::where('is_default', 1)->first()->title;
    }

    public function selectedCurrencySymbol()
    {
        return Currency::where('is_default', 1)->first()->code;
    }

    public function contentpages()
    {
        $languageId = $this->selectedLenguage();
        $page = new Page;
        $page = $page->getPageDetailByLanguageId($languageId);
        $page = $page->where('id', '<', '6');
        $page = $page->get();

        return $page;
    }

    public function HomeBanners()
    {
        $languageId = $this->selectedLenguage();
        $homeBanners = HomeBanner::with('gallary')->where('language_id', $languageId)->get();

        return $homeBanners;
    }
}
