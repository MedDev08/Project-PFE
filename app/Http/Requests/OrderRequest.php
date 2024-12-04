<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'num'=>['required',Rule::unique('orders','num')],
            'unit_price'=>['required','numeric'],
            'companies_id'=>'required',
            'services_id'=>'required',
            'start_date' => 'required|date|before_or_equal:finish_date', 
            'finish_date' => 'required|date|after_or_equal:start_date',
            'checkboxes' => 'required|array',
            'checkboxes.*' => 'exists:salaries,id',
        ];
    }
}
