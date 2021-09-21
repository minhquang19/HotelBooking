<?php

namespace App\Http\Requests\Tag_room;

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
            'room_id'=>'required',
            'tag_id'=>'required',
            'tag_name'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'room_id.required'=>'Yêu cầu nhập tên danh mục'
        ];
    }
}
