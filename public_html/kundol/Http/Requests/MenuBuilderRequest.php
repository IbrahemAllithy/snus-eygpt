<?php

namespace App\Http\Requests;

use App\Models\Admin\Language;
use Illuminate\Foundation\Http\FormRequest;

class MenuBuilderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $size = Language::where('status', '=', 'active')->count();

        return [
            'menu' => 'required|json',
        ];
    }
}
