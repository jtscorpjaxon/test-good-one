<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data'=>'required',
            'data.*.product_id' => 'required|exists:products,id',
            'data.*.quantity' => 'required|integer',
        ];
    }
}
