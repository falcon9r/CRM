<?php

namespace App\Http\Requests\Order\Status;

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
            'name' => 'required|string|unique:orders_statuses,name,'.$this->route('status'),
            'code_color' => 'code_color|string|unique:orders_statuses,code_color,'.$this->route('status')
        ];
    }
}
