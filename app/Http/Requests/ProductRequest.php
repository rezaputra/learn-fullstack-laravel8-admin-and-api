<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name|max:200',
            'stock' => 'required|min:0|integer',
            'price' => 'required|min:0|numeric',
            'description' => 'required',
            'img0' => 'required|max:5020|mimes:png,jpg, jpeg',
            'img1' => 'required|max:5020|mimes:png,jpg, jpeg',
            'img2' => 'required|max:5020|mimes:png,jpg, jpeg',
        ];
    }
}
