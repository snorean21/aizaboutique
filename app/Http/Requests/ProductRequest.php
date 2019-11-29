<?php

namespace AizaBoutique\Http\Requests;

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
            'image' => 'required|image|mimes:jpeg,png',
            'reference' => 'required|numeric|unique:products,reference,'. $this->products,
            'category' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required',
            'unit_price' => 'required|numeric',
            'price_for_wholesale' => 'required|numeric'
        ];
    }
}
