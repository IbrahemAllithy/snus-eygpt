<?php

namespace App\Http\Requests;

use App\Rules\HashPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'current_password' => new HashPassword,
            'new_password' => 'required',
            'confirm_password' => 'same:new_password|required',
        ];
    }
}
