<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'content'=>'required',
            'name_vi'=>'required',
            'description_vi'=>'required',
            'content_vi'=>'required',
            'image'=>'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}

