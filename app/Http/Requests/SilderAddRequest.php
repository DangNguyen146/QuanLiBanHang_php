<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SilderAddRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập name',
            'name.unique' => 'Không được trùng name',
            'name.max' => 'Độ dài ký tự tối đa là 255',
            'description.required' => 'Vui lòng nhập mô tả',
            'image_path.required' => 'Vui lòng nhập file',
        ];
    }
}
