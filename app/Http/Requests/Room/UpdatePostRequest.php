<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'name_vi'=>'required',
            'description'=>'required',
            'description_vi'=>'required',
            'category_id'=>'required',
            'area'=>'required',
            'status'=>'required',
            'visibility'=>'required',
            'bad'=>'required',
            'bath'=>'required',
        ];
    }
}
