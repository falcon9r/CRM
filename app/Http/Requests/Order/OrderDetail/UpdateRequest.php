<?php

namespace App\Http\Requests\Order\OrderDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_id' => 'required|integer|exists:orders,id|user_has_order',
            'product_id' => 'required|integer|exists:products,id',
            'price' => 'required|numeric',
            'type_money' => 'required|boolean'
        ];
    }
}
