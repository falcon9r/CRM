<?php

namespace App\Http\Requests\Order\Order;

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
            'client_id' => 'required|integer|exists:clients,id|right_client',
            'order_status_id' => 'required|integer|exists,orders_statuses',
            'price' => 'required|numeric',
            'type_money' => 'required|boolean',
        ];
    }
}
